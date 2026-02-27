@echo off
setlocal enabledelayedexpansion
title KHA-PARKING CONTROL CENTER - PRO CHECK
color 0E
cls

echo ======================================================
echo           KIEM TRA HE THONG KHA-PARKING (PRO)
echo ======================================================
echo.

set "FAILED=0"

:: 1. Kiem tra PHP
php -v >nul 2>&1
if %errorlevel% neq 0 (
    color 0C
    echo [LOI] Khong tim thay PHP. IT can cai dat PHP va them vao Environment Path.
    set "FAILED=1"
) else (
    echo [OK] PHP da san sang.
)

:: 2. Kiem tra thu muc vendor (Composer)
if not exist "vendor" (
    echo [LOI] Thieu thu muc 'vendor'. IT can chay lenh 'composer install'.
    set "FAILED=1"
) else (
    echo [OK] Thu vien Laravel (vendor) da hop le.
)

:: 3. Kiem tra Extensions
echo.
echo --- Kiem tra PHP Extensions ---
for %%e in (openssl sqlsrv pdo_sqlsrv bcmath ctype fileinfo json mbstring tokenizer xml) do (
    php -m | findstr /i "%%e" >nul 2>&1
    if !errorlevel! neq 0 (
        echo [LOI] Thieu extension: %%e
        set "FAILED=1"
    ) else (
        echo [OK] Extension: %%e [OK]
    )
)

:: 4. Kiem tra SQL Server va DB Connection
echo.
echo --- Kiem tra Ket noi Database ---
netstat -ano | findstr ":1433" | findstr "LISTENING" >nul 2>&1
if %errorlevel% neq 0 (
    echo [CANH BAO] SQL Server Port 1433 chua mo. Dang thu net start...
    net start MSSQLSERVER >nul 2>&1
)

:: Thu ket noi thuc te bang PHP (Kiem tra User/Pass/DB)
if exist .env (
    php -r "try { require 'vendor/autoload.php'; $app = require_once 'bootstrap/app.php'; $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap(); \DB::connection()->getPdo(); echo 'SUCCESS'; } catch (\Exception $e) { echo 'ERROR'; }" > temp_db_check.txt 2>&1
    set /p DB_STATUS=<temp_db_check.txt
    del temp_db_check.txt
    if "!DB_STATUS!"=="SUCCESS" (
        echo [OK] Ket noi den SQL Server thanh cong.
    ) else (
        echo [LOI] Khong the dang nhap SQL Server. Kiem tra User/Pass trong .env
        set "FAILED=1"
    )
)

:: 5. Kiem tra Cong 8000
netstat -ano | findstr ":8000" | findstr "LISTENING" >nul 2>&1
if %errorlevel% equ 0 (
    echo [CANH BAO] Cong 8000 dang bi chiem dung. 
    echo Vui long tat ung dung dang dung cong 8000 hoac khoi dong lai may.
    set "FAILED=1"
)

:: 6. Ket luan
echo.
echo ======================================================
if %FAILED% equ 1 (
    color 0C
    echo [KET QUA] HE THONG CHUA SAN SANG!
    echo.
    echo IT vui long xu ly cac dong [LOI] mau do truoc khi tiep tuc.
    echo Nhan phim bat ky de thoat...
    pause >nul
    exit
) else (
    color 0A
    echo [KET QUA] MOI THU HOAN HAO!
    echo.
    echo [1] KHOI DONG HE THONG (START SERVER)
    echo [2] THOAT
    set /p choice="Chon (1-2): "
    
    if "!choice!"=="1" (
        :: Tu dong tao link storage neu chua co
        if not exist "public\storage" (
            php artisan storage:link >nul 2>&1
        )
        :: Xoa cache cu de chay muot hon
        php artisan config:clear >nul 2>&1
        
        start http://127.0.0.1:8000
        echo Dang chay may chu... Vui long khong tat cua so nay.
        php artisan serve --port=8000
    ) else (
        exit
    )
)
pause

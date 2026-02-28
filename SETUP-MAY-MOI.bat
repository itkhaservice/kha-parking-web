@echo off
setlocal enabledelayedexpansion

title "KHA-PARKING | SETUP MAY MOI (ONE-CLICK)"
color 0B
cls

echo ======================================================
echo    🅿️ KHA-PARKING: HE THONG QUAN LY BAI XE
echo    [ QUY TRINH CAI DAT TU DONG CHO MAY MOI ]
echo ======================================================
echo.

:: 1. Kiem tra Quyen Admin (Can de sua file hosts)
net session >nul 2>&1
if %errorLevel% == 0 (
    echo [OK] Da co quyen Admin.
) else (
    echo [!] LOI: Vui long chay file nay bang quyen "Run as Administrator"!
    pause
    exit /b
)

:: 2. Giai nen PHP Portable (neu chua co)
set "PHP_BIN=bin\php\php.exe"
if not exist "%PHP_BIN%" (
    echo.
    echo [1/5] Dang giai nen PHP 8.2 Portable...
    if exist "php-8.2.30-nts-Win32-vs16-x64.zip" (
        powershell -Command "Expand-Archive -Path 'php-8.2.30-nts-Win32-vs16-x64.zip' -DestinationPath 'bin\php' -Force"
        echo  - [OK] Da giai nen xong PHP.
    ) else (
        echo  - [!] LOI: Khong tim thay file php zip trong thu muc project!
    )
)

:: 3. Cau hinh Virtual Hostname (parking-db)
echo.
echo [2/5] Dang cau hinh Hostname 'parking-db' vao he thong...
findstr /i "parking-db" C:\Windows\System32\drivers\etc\hosts >nul
if %errorLevel% == 0 (
    echo  - [OK] Hostname 'parking-db' da co san.
) else (
    echo 127.0.0.1   parking-db >> C:\Windows\System32\drivers\etc\hosts
    echo  - [OK] Da them '127.0.0.1 parking-db' vao file hosts.
)

:: 4. Khoi tao file .env
echo.
echo [3/5] Dang khoi tao file cau hinh (.env)...
if not exist .env (
    copy .env.example .env >nul
    echo  - [OK] Da tao file .env tu file mau.
) else (
    echo  - [OK] File .env da ton tai.
)

:: 5. Tao APP_KEY (Laravel Security)
echo.
echo [4/5] Dang tao ma bao mat ung dung...
"%PHP_BIN%" artisan key:generate --no-interaction
echo  - [OK] Da tao APP_KEY thanh cong.

:: 6. Thong bao ve SQL Server
echo.
echo [5/5] KIEM TRA DATABASE (QUAN TRONG):
echo  - Vui long dam bao ban da cai dat SQL Server (Express/Standard).
echo  - Hay tao mot Database ten la: kha_parking_db
echo  - Mat khau 'sa' mac dinh: 123ABC (Co the doi trong .env)
echo.
set /p run_migrate="Ban co muon chay Migration de tao bang ngay bay gio ko? (Y/N): "
if /i "%run_migrate%"=="Y" (
    echo.
    echo  [*] Dang thiet lap bang du lieu...
    "%PHP_BIN%" artisan migrate --seed --force
    echo  - [OK] Da tao cac bang du lieu va nạp tai khoan IT Admin.
)

echo.
echo ======================================================
echo    CHUC MUNG! CAI DAT HOAN TAT.
echo ======================================================
echo  1. Bay gio ban co the chay file: Kha-Parking-Start.bat
echo  2. Truy cap: http://localhost:8000
echo.
echo  - Account IT: it@khaservice.vn
echo  - Password:   0310341786
echo ======================================================
echo.
pause
exit

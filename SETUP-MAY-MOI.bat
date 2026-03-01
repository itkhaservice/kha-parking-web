@echo off
pushd "%~dp0"
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

:: Kiem tra PHP co chay duoc ko (loi thieu VC Redist)
"%PHP_BIN%" -v >nul 2>&1
if !errorlevel! neq 0 (
    echo  - [!] LOI NGHIEM TRONG: Khong the thuc thi PHP! 
    echo    Vui long cai dat "Visual C++ Redistributable 2019" de tiep tuc.
    pause
    exit /b
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
echo [4/6] Dang tao ma bao mat ung dung...
"%PHP_BIN%" artisan key:generate --no-interaction
echo  - [OK] Da tao APP_KEY thanh cong.

:: 6. Tu dong cau hinh SQL Server (TCP/IP & Port 1433)
echo.
echo [5/6] DANG TU DONG CAU HINH SQL SERVER...
echo  - Dang quet va bat giao thuc TCP/IP...
for /f "tokens=3" %%a in ('reg query "HKLM\SOFTWARE\Microsoft\Microsoft SQL Server\Instance Names\SQL" 2^>nul') do (
    set "INST_ID=%%a"
    echo    + Cau hinh Instance: !INST_ID!
    reg add "HKLM\SOFTWARE\Microsoft\Microsoft SQL Server\!INST_ID!\MSSQLServer\SuperSocketNetLib\Tcp" /v Enabled /t REG_DWORD /d 1 /f >nul 2>&1
    reg add "HKLM\SOFTWARE\Microsoft\Microsoft SQL Server\!INST_ID!\MSSQLServer\SuperSocketNetLib\Tcp\IPAll" /v TcpPort /t REG_SZ /d 1433 /f >nul 2>&1
)
echo  - Dang mo Firewall Port 1433...
netsh advfirewall firewall add rule name="KHA-PARKING-SQL" dir=in action=allow protocol=TCP localport=1433 profile=any >nul 2>&1
echo  - Dang khoi dong lai dich vu SQL Server (Vui long cho)...
net stop MSSQLSERVER /y >nul 2>&1
net start MSSQLSERVER >nul 2>&1
net stop MSSQL$SQLEXPRESS /y >nul 2>&1
net start MSSQL$SQLEXPRESS >nul 2>&1
echo  - [OK] Da cau hinh va mo ket noi SQL Server.

:: 7. Thong bao ve SQL Server
echo.
echo [6/6] KHOI TAO DU LIEU:
echo  - Database yeu cau: kha_parking_db (sa / 123ABC)
echo.
set /p run_migrate="Ban co muon Tu dong tao cac bang du lieu (Database tables) ngay bay gio ko? (Y/N): "
if /i "%run_migrate%"=="Y" (
    echo.
    echo  [*] Dang khoi tao cac bang du lieu...
    "%PHP_BIN%" artisan migrate --seed --force
    if !errorlevel! equ 0 (
        echo  - [OK] Da tao cac bang du lieu va nap tai khoan IT Admin.
    ) else (
        echo  - [!] LOI: Khong the ket noi den SQL Server hoac chua co Database 'kha_parking_db'.
        echo    Hay dam bao SQL Server dang chay va da tao DB nhu huong dan o tren.
    )
)

echo.
echo ======================================================
echo    CHUC MUNG! CAI DAT HOAN TAT.
echo ======================================================
echo  1. Bay gio ban co the chay file: Kha-Parking-Start.bat
echo  2. Truy cap: http://localhost:8000
echo.
echo  - Account IT: ITKHA
echo  - Password:   0310341786
echo ======================================================
echo.
pause
exit

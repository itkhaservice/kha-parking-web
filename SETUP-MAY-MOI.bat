@echo off
title KHA-PARKING | HUONG DAN CAI DAT NHANH
color 0A

echo.
echo ========================================================
echo   HUONG DAN CAI DAT KHA-PARKING TREN MAY MOI
echo ========================================================
echo.
echo 1. CAI DAT PHAN MEM CAN THIET (Neu chua co):
echo    - XAMPP (PHP 8.1+)
echo    - Composer (getcomposer.org)
echo    - NodeJS (nodejs.org)
echo.
echo 2. CAU HINH DATABASE:
echo    - Mo XAMPP, Start MySQL.
echo    - Truoc khi tiep tuc, hay tao 1 database ten la: kha_parking_db
echo.
echo ========================================================
set /p proceed="An Enter de bat dau cau hinh tu dong..."

echo.
echo [1/4] Dang tao file .env tu file mau...
if not exist .env copy .env.example .env

echo.
echo [2/4] Dang cai dat thu vien PHP (Composer)...
call composer install --no-interaction

echo.
echo [3/4] Dang cai dat thu vien JS (NPM)...
call npm install --silent

echo.
echo [4/4] Dang tao khoa bao mat (APP_KEY)...
call php artisan key:generate

echo.
echo [DONE] Dang chay Migration (Tao bang trong SQL)...
call php artisan migrate

echo.
echo ========================================================
echo   CAI DAT THANH CONG! 
echo   Bay gio hay chay file "Kha-Parking-Start.bat" de su dung.
echo ========================================================
pause

@echo off
pushd "%~dp0"
setlocal enabledelayedexpansion

title KHA-PARKING SYSTEM - LAUNCHER
color 0A
cls

echo ======================================================
echo           KHA-PARKING SYSTEM - KHOI DONG
echo ======================================================
echo.

set "PORT=8000"
set "PHP_BIN=bin\php\php.exe"

:: 1. Kiem tra PHP
if not exist "%PHP_BIN%" (
    echo [!] Dang chuan bi PHP Portable...
    powershell -Command "Expand-Archive -Path 'php-8.2.30-nts-Win32-vs16-x64.zip' -DestinationPath 'bin\php' -Force"
)

:: 2. Lay IP LAN
for /f "tokens=4" %%a in ('route print ^| findstr 0.0.0.0 ^| findstr /v "255.255.255.255"') do (
    set "LAN_IP=%%a"
    goto :IP_FOUND
)
:IP_FOUND
if "%LAN_IP%"=="" set "LAN_IP=127.0.0.1"

:: 3. Tat cac tien trinh cu
taskkill /F /IM php.exe /T >nul 2>&1
taskkill /F /IM node.exe /T >nul 2>&1

echo  [OK] Dang kich hoat dich vu he thong...
echo.
echo  ------------------------------------------------------
echo    DIA CHI TRUY CAP CHO MAY KHAC TRONG LAN:
echo    http://%LAN_IP%:%PORT%
echo  ------------------------------------------------------
echo.

:: 4. TAO FILE CHAY NGAM (VBScript)
:: File nay giup chay PHP va Vite ma khong hien cua so CMD
echo Set WshShell = CreateObject("WScript.Shell") > launch_hidden.vbs
echo WshShell.Run """%~dp0%PHP_BIN%"" -S 0.0.0.0:%PORT% server.php", 0, false >> launch_hidden.vbs
echo WshShell.Run "cmd.exe /c npm run dev", 0, false >> launch_hidden.vbs

:: Chay file VBS va xoa ngay sau do
wscript.exe launch_hidden.vbs
del launch_hidden.vbs

:: 5. Mo trinh duyet
timeout /t 2 /nobreak >nul
start http://%LAN_IP%:%PORT%

echo.
echo  [THANH CONG] He thong da san sang.
echo  Cua so nay se tu dong dong sau 3 giay...
timeout /t 3 /nobreak >nul
exit

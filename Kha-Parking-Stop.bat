@echo off
title KHA-PARKING - STOP SYSTEM
color 0C
cls

echo ======================================================
echo           DANG DUNG HE THONG KHA-PARKING
echo ======================================================
echo.

echo [!] Dang tat cac dich vu dang chay ngam...
taskkill /F /IM php.exe /T >nul 2>&1
taskkill /F /IM node.exe /T >nul 2>&1

echo.
echo [OK] DA DUNG TOAN BO HE THONG.
echo.
timeout /t 3 /nobreak >nul
exit

@echo off
pushd "%~dp0"
title KHA-PARKING | FIX SQL CONNECTION
color 0E
cls

echo ======================================================
echo    🅿️ KHA-PARKING: CONG CU SUA KET NOI SQL SERVER
echo ======================================================
echo.

:: 1. Kiem tra Quyen Admin
net session >nul 2>&1
if %errorLevel% neq 0 (
    echo [!] LOI: Vui long chay file nay bang "Run as Administrator"!
    pause
    exit /b
)

echo [*] Dang tim Instance SQL Server...
for /f "tokens=3" %%a in ('reg query "HKLM\SOFTWARE\Microsoft\Microsoft SQL Server\Instance Names\SQL" 2^>nul') do (
    set "INST_ID=%%a"
    echo  - Da tim thay Instance: !INST_ID!
    
    :: Bat TCP/IP
    reg add "HKLM\SOFTWARE\Microsoft\Microsoft SQL Server\!INST_ID!\MSSQLServer\SuperSocketNetLib\Tcp" /v Enabled /t REG_DWORD /d 1 /f >nul 2>&1
    
    :: Set Port 1433
    reg add "HKLM\SOFTWARE\Microsoft\Microsoft SQL Server\!INST_ID!\MSSQLServer\SuperSocketNetLib\Tcp\IPAll" /v TcpPort /t REG_SZ /d 1433 /f >nul 2>&1
)

echo.
echo [*] Dang mo Firewall Port 1433...
netsh advfirewall firewall add rule name="KHA-PARKING-SQL" dir=in action=allow protocol=TCP localport=1433 profile=any >nul 2>&1

echo.
echo [*] Dang khoi dong lai cac dich vu SQL Server...
net stop MSSQLSERVER /y >nul 2>&1
net start MSSQLSERVER >nul 2>&1
net stop MSSQL$SQLEXPRESS /y >nul 2>&1
net start MSSQL$SQLEXPRESS >nul 2>&1

echo.
echo ======================================================
echo [OK] DA HOAN TAT CAU HINH! 
echo Bay gio ban hay chay: Kha-Parking-Start.bat
echo ======================================================
echo.
pause
exit

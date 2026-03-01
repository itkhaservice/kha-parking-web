@echo off
pushd "%~dp0"
title KHA-PARKING - BUILD LAUNCHER
color 0B
cls

echo ======================================================
echo    DANG DONG GOI LAUNCHER...
echo ======================================================
echo.

:: 1. Tim trinh bien dich C# (CSC.exe)
set "CSC="
for /d %%i in (%windir%\Microsoft.NET\Framework64\v4*) do (
    if exist "%%i\csc.exe" set "CSC=%%i\csc.exe"
)

if "%CSC%"=="" (
    for /d %%i in (%windir%\Microsoft.NET\Framework\v4*) do (
        if exist "%%i\csc.exe" set "CSC=%%i\csc.exe"
    )
)

if "%CSC%"=="" (
    echo [!] LOI: Khong tim thay trinh bien dich .NET Framework tren may nay!
    pause
    exit
)

echo [1/2] Tim thay trinh bien dich tai:
echo       %CSC%
echo.

:: 2. Bien dich file Launcher.cs thanh KhaParking.exe
echo [2/2] Dang bien dich...

"%CSC%" /target:winexe /out:KhaParking.exe /r:System.Windows.Forms.dll /r:System.Drawing.dll Launcher.cs

if %errorlevel% == 0 (
    echo.
    echo [OK] THANH CONG!
    echo ------------------------------------------------------
    echo File chay da duoc tao: KhaParking.exe
    echo Ban co the xoa file 'Launcher.cs' va 'BUILD-EXE.bat' neu muon.
    echo ------------------------------------------------------
    echo.
) else (
    echo.
    echo [!] LOI: Qua trinh bien dich that bai. Kiem tra lai code!
)

pause

# Fix SQL Server TCP/IP Settings
$instances = @('MSSQLSERVER', 'SQLEXPRESS')
$results = @()

foreach ($inst in $instances) {
    $path = "HKLM:\SOFTWARE\Microsoft\Microsoft SQL Server\Instance Names\SQL"
    if (Test-Path $path) {
        $regInfo = Get-ItemProperty -Path $path
        if ($regInfo.$inst) {
            $realID = $regInfo.$inst
            $tcpPath = "HKLM:\SOFTWARE\Microsoft\Microsoft SQL Server\$realID\MSSQLServer\SuperSocketNetLib\Tcp"
            
            if (Test-Path $tcpPath) {
                # 1. Enable TCP
                Set-ItemProperty -Path $tcpPath -Name "Enabled" -Value 1 -ErrorAction SilentlyContinue
                
                # 2. Set Port 1433 for IPAll
                $ipAllPath = "$tcpPath\IPAll"
                if (Test-Path $ipAllPath) {
                    Set-ItemProperty -Path $ipAllPath -Name "TcpPort" -Value "1433" -ErrorAction SilentlyContinue
                }
                $results += "Configured $inst ($realID)"
            }
        }
    }
}

# 3. Firewall Rule
netsh advfirewall firewall add rule name="KHA-PARKING-SQL" dir=in action=allow protocol=TCP localport=1433 profile=any

# 4. Restart Services
Restart-Service -Name "MSSQLSERVER" -Force -ErrorAction SilentlyContinue
Restart-Service -Name "MSSQL$SQLEXPRESS" -Force -ErrorAction SilentlyContinue

Write-Host "--- RESULTS ---"
$results | ForEach-Object { Write-Host "[OK] $_" }
Write-Host "[XONG] Da kich hoat va khoi dong lai SQL Server."

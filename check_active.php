<?php
$serverName = "127.0.0.1, 1433";
$connectionInfo = array("Database"=>"GIUXE", "UID"=>"sa", "PWD"=>"123ABC", "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$tableName = "Active";
$sql = "SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tableName'";
$stmt = sqlsrv_query($conn, $sql);

if($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "--- COLUMNS IN $tableName ---\n";
while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo $row['COLUMN_NAME'] . " (" . $row['DATA_TYPE'] . ")\n";
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>

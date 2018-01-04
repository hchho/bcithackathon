<?php // PHP Data Objects(PDO) Sample Code:
phpinfo();
try {
    $conn = new PDO("sqlsrv:server = tcp:bcithackathon.database.windows.net,1433; Database = bcithackathon", "grouptwo", "BC1Th@ck");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "grouptwo@bcithackathon", "pwd" => "{your_password_here}", "Database" => "bcithackathon", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:bcithackathon.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
<?php
// $serverName = "bcithackathon.database.windows.net"; //serverName\instanceName
// $connectionInfo = array( "Database"=>"bcithackathon");

//     $conn = sqlsrv_connect( $serverName, $connectionInfo);

// if( $conn ) {
//      echo "Connection established.<br />";
// }else{
//      echo "Connection could not be established.<br />";
//      die( print_r( sqlsrv_errors(), true));
// } 

?>
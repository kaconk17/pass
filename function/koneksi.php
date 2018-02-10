<?php
$serverName = "NPMI1020";
$connectionInfo = array("Database"=> "pass" , "UID" => "sa", "PWD"=> "NPMI" );
$conn = sqlsrv_connect ($serverName , $connectionInfo) or die (sqlsrv_error());

?>
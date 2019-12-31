<?php
/*****************************************
* This query uses the procedural interface
******************************************/

// Credentials

$dbhost = 'database_address';
$dbuser = 'user';
$dbpass = 'password';
$dbname = 'db_name';

// $dbhost = 'localhost';
// $dbuser = 'root';
// $dbpass = 'password';
// $dbname = 'db_name';

// 1. Create a database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
// else echo "Connected successfully";

// 5. Close database connection
//mysqli_close($connection);
?>

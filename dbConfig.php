<?php

define('DB_SERVER', 'localhost:3307');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'adstest');
 

$dbConnection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

if($dbConnection === false){
    die("Could not connect to the database\nError: " . mysqli_connect_error());
}
?>
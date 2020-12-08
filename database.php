<?php
// Change Time Zone to HK
date_default_timezone_set('Asia/Hong_Kong');

//Connect to database
$db_host = 'localhost';
$dbUsername = 'root';
$dbPassword = 'password';
$dbName = 'SEHS4517_HP';

$conn = new mysqli($db_host, $dbUsername, $dbPassword, $dbName);



?>
<?php

$host = "127.0.0.1";
$dbname = "test";
$username = "root";
$password = "123";

    $mysqli = new mysqli(hostname: $host,
                        username: $username,
                        password: $password,
                        database: $dbname);
                        
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;
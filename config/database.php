<?php

$host = "localhost";
$db_name = "Users";
$username = "root";
$password = "loveU2020.a";
  
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
  
catch(PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}

?>
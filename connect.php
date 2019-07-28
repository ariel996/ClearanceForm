<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 24/12/2017
 * Time: 15:58
 */
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=clearanceform", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo "Connection failed: ". $e->getMessage();
}
?>
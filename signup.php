<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 24/12/2017
 * Time: 16:55
 */
require 'connect.php';

$username = $_POST['username'];
$userpass = sha1($_POST['userpass']);
$sql = "INSERT INTO student(username, studentpassword) VALUES (?,?)";
$query = $conn->prepare($sql);
$query->execute(array($username, $userpass));
$count = $query->rowCount();

if ($count > 0) {
    echo '1';
} else {
    echo '0';
}
?>
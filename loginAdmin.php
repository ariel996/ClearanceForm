<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 26/12/2017
 * Time: 10:55
 */
include 'connect.php';

$username = $_POST['username'];
$userpassword = sha1($_POST['userpass']);

$sql = "SELECT * FROM users WHERE username = ? AND userpassword = ?";
$query = $conn->prepare($sql);
$query->execute(array($username, $userpassword));
$row = $query->fetch();
$count = $query->rowCount();

if ($count > 0) {
    session_start();
    $_SESSION['id'] = $row['user_id'];
    echo '1';
} else {
    echo '0';
}

?>
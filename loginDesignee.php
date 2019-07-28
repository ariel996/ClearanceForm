<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 26/12/2017
 * Time: 11:26
 */

include 'connect.php';

$username = $_POST['username'];
$userpassword = $_POST['userpass'];

$sql = "SELECT * FROM designee WHERE username = ? AND password = ?";
$query = $conn->prepare($sql);
$query->execute(array($username, $userpassword));
$row = $query->fetch();
$count = $query->rowCount();

if ($count > 0) {
    session_start();
    $_SESSION['id'] = $row['designee_id'];
    echo '1';
} else {
    echo '0';
}

?>
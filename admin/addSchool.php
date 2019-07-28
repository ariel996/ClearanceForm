<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 28/12/2017
 * Time: 14:24
 */

include '../connect.php';

$schoolCode = $_POST['schoolCode'];
$schoolName = $_POST['schoolName'];

$sql = "INSERT INTO school(school_code, school_name) VALUES (?, ?)";
$query = $conn->prepare($sql);
$query->execute(array($schoolCode, $schoolName));
$count = $query->rowCount();

if ($count > 0) {
    echo '1';
} else {
    echo '0';
}

?>
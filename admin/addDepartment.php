<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 04/01/2018
 * Time: 12:10
 */
include '../connect.php';

$departName = $_POST['departName'];
$departCode = $_POST['departCode'];
$schoolid = $_POST['school_id'];

$sql = "INSERT INTO department(department_name, department_code, school_id) VALUES (?, ?, ?)";
$query = $conn->prepare($sql);
$query->execute(array($departName, $departCode, $schoolid));
$count = $query->rowCount();

if ($count > 0) {
    echo '1';
} else {
    echo '0';
}

?>
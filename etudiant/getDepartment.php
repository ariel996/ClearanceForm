<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 04/01/2018
 * Time: 22:08
 */
include '../connect.php';
extract($_POST);
$schoolid = $_POST['depart_id'];

$sql = "SELECT * FROM department WHERE school_id= ? ORDER BY department_name";
$query = $conn->prepare($sql);
$query->execute(array($schoolid));

while ($row = $query->fetch()) {
    echo "<option value='$row[0]'>$row[1]</option>";
}
?>
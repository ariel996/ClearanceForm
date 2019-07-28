<html>
<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 04/01/2018
 * Time: 11:49
 */
include '../connect.php';
$schoolid = $_POST['depart_id'];

$sql = "SELECT * FROM department WHERE school_id = '".$schoolid."'";
$query = $conn->query($sql);
$rs = $query->fetch();

echo "<input type='text' value='$rs[3]' name='schoolid' class='form-control'>";

?>
<html>

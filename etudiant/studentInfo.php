<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 07/01/2018
 * Time: 14:20
 */
include '../connect.php';
include '../session_student.php';
// Declaration of variables
$userId = $_SESSION['id'];
$matricule = strtoupper($_POST['matricule']);
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$designation = $_POST['designation'];
$names = strtoupper($_POST['names']);
$contactno = $_POST['contactno'];
$email = $_POST['email'];
$cycle = $_POST['cycle'];
$schoolId = $_POST['schoolId'];
$departId = $_POST['departId'];

$sql = "UPDATE student SET matricule = ?, names = ?, birthdate = ?, contactno = ?, gender = ?, email = ?, designation = ?, cycle = ?, school_id = ?, depart_id = ? WHERE student_id = $userId";
$query = $conn->prepare($sql);
$row = $query->execute(array($matricule, $names, $birthdate, $contactno, $gender, $email, $designation, $cycle, $schoolId, $departId));

if ($row) {
    echo '1';
} else {
    echo '0';
}
?>
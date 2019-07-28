<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 10/01/2018
 * Time: 19:02
 */
include '../connect.php';

// Declaration of variables
$fees1 = $_FILES['file']['fees1'];
$fees2 = $_POST['fees2'];
$fees3 = $_POST['fees3'];
$sa1 = $_POST['sa1'];
$sa2 = $_POST['sa2'];
$sa3 = $_POST['sa3'];
$mf1 = $_POST['mf1'];
$mf2 = $_POST['mf2'];
$mf3 = $_POST['mf3'];
$in1 = $_POST['in1'];
$in2 = $_POST['in2'];
$in3 = $_POST['in3'];
$studentid = $_POST['studentid'];

$sql = "INSERT INTO insurance_fees(insurance_one, insurance_two, insurance_three, insurance_status, student_id) VALUES (?, ?, ?, ?, ?)";
$sql2 = "INSERT INTO medicalfees_receipt(fees_one, fees_two, fees_three, fees_status, student_id) VALUES (?, ?, ?, ?, ?)";
$sql3 = "INSERT INTO sa_fees(safees_one, sa_fees_two, sa_fees_three, sa_status, student_id) VALUES (?, ?, ?, ?, ?)";
$sql4 = "INSERT INTO school_feesreceipt(receipt_one, receipt_two, receipt_three, fees_status, student_id) VALUES (?, ?, ?, ?, ?)";

$query = $conn->prepare($sql);
$query2 = $conn->prepare($sql2);
$query3 = $conn->prepare($sql3);
$query4 = $conn->prepare($sql4);

$query->execute(array($in1, $in2, $in3, '0', $studentid));
$query2->execute(array($mf1, $mf2, $mf3, '0', $studentid));
$query3->execute(array($sa1, $sa2, $sa3, '0', $studentid));
$query4->execute(array($fees1, $fees2, $fees3, '0', $studentid));

$row1 = $query->rowCount();
$row2 = $query2->rowCount();
$row3 = $query3->rowCount();
$row4 = $query4->rowCount();

if($row1 >0 && $row2 >0 && $row3 > 0 && $row4 >0) {
    echo '1';
} else {
    echo '0';
}




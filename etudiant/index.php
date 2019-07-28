<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 24/12/2017
 * Time: 17:09
 */

include '../connect.php';
session_start();

if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) { ?>
    <script>
        window.location = '../index.php';
    </script>
    <?php
}

$session_id = $_SESSION['id'];

$sql = "SELECT * FROM student WHERE student_id=$session_id";
$query = $conn->prepare($sql);
$query->execute(array($session_id));
$row = $query->fetch();

$username = $row['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clearance Form</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../css/sb-admin.css">
    <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
    <link rel="icon" href="../img/uba.png">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php

include 'navigation.php';

?>
<!-- The content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
    </div>
</div>
<!-- container fluid -->
<!-- content wrapper -->
<?php
include 'footer.php';
?>

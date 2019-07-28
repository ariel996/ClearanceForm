<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 07/01/2018
 * Time: 15:17
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
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.css"/>
        <link rel="stylesheet" type="text/css" href="../css/sb-admin.css"/>
        <link rel="stylesheet" type="text/css" href="../css/sweetalert.css"/>
        <link rel="icon" href="../img/uba.png">
    </head>
    <body class="fixed-nav sticky-footer bg-dark">

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
            <li class="breadcrumb-item">Folder</li>
            <li class="breadcrumb-item active">My Receipts</li>
        </ol>

        <div class="alert alert-info alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Please ! </strong>Upload your school receipt such as: School fees, Medical fees, Student Association fees, Insurance fees.
        </div>

        <!-- The form -->
        <form>
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item active">
                    <a class="nav-link" data-toggle="pill" href="#school">School</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#sa">Student Association</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#mf">Medical fees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#in">Insurance</a>
                </li>
            </ul>
            <div class="tab-content">
                    <!-- School fees -->
                    <div id="school" class="tab-pane fade in active">
                        <h3>School Receipt</h3>
                        <div class="row">
                            <div class="col-md-5 col-xs-3">
                                <div class="form-group row">
                                    <label for="fees1" class="col-2 col-form-label">Year 1 receipt</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="fees1" id="fees1" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fees2" class="col-2 col-form-label">Year 2 receipt</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="fees2" required id="fees2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fees3" class="col-2 col-form-label">Year 3 receipt</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="fees3" required id="fees3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Student Association -->
                    <div id="sa" class="tab-pane fade">
                        <h3>Student Association</h3>
                        <div class="row">
                            <div class="col-md-5 col-xs-3">
                                <div class="form-group row">
                                    <label for="sa1" class="col-2 col-form-label">Year 1 receipt</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="sa1" required id="sa1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sa2" class="col-2 col-form-label">Year 2 receipt</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="sa2" required id="sa2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sa3" class="col-2 col-form-label">Year 3 receipt</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="sa3" required id="sa3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Medical Fees -->
                    <div id="mf" class="tab-pane fade">
                        <h3>Medical Fees</h3>
                        <div class="row">
                            <div class="col-md-5 col-xs-3">
                                <div class="form-group row">
                                    <label for="mf1" class="col-2 col-form-label">Year 1 receipt</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="mf1" required id="mf1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <input type="hidden" value="<?= $row[0];  ?>" name="studentid">
                                </div>
                                <div class="form-group row">
                                    <label for="mf2" class="col-2 col-form-label">Year 2 receipt</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="mf2" required id="mf2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mf3" class="col-2 col-form-label">Year 3 receipt</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="mf3" required id="mf3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Medical Fees -->
                    <div id="in" class="tab-pane fade">
                        <h3>Insurance Fees</h3>
                        <div class="row">
                            <div class="col-md-5 col-xs-3">
                                <div class="form-group row">
                                    <label for="in1" class="col-2 col-form-label">Year 1 receipt</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="in1" required id="in1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="in2" class="col-2 col-form-label">Year 2 receipt</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="in2" required id="in2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="in3" class="col-2 col-form-label">Year 3 receipt</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" name="in3" required id="in3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-danger" data-toggle="tooltip" data-displacement="right" title="Click to Cancel">Cancel</button>
                            <button class="btn btn-outline-primary" id="upload" data-toggle="tooltip" data-displacement="right" title="Click to upload your files"><i class="fa fa-fw fa-send-o"></i> Upload</button>
                        </div>
                    </div>
            </div>
        </form>
    </div><!-- container fluid -->
</div><!-- content -->
<!-- The footer -->
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © University of Bamenda 2018</small>
        </div>
    </div>
</footer>

<!-- jQuery CDN -->
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/jquery.easing.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/sb-admin.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#upload").click(function(e) {
                e.preventDefault();
                // Declaration of variables
                fees1 = $("#fees1").val();
                fees2 = $("#fees2").val();
                fees3 = $("#fees3").val(); // School fees receipt
                sa1 = $("#sa1").val();
                sa2 = $("#sa2").val();
                sa3 = $("#sa3").val(); // Student association fees
                mf1 = $("#mf1").val();
                mf2 = $("#mf2").val();
                mf3 = $("#mf3").val(); // Medical fees
                in1 = $("#in1").val();
                in2 = $("#in2").val();
                in3 = $("#in3").val(); // Insurance fees

                studentid = $.trim($('input[name="studentid"]').val());


                $.ajax({
                    type: 'POST',
                    url: 'uploadfees.php',
                    data: {fees1: fees1,
                        fees2: fees2,
                        fees3: fees3,
                        sa1: sa1,
                        sa2: sa2,
                        sa3: sa3,
                        mf1: mf1,
                        mf2: mf2,
                        mf3: mf3,
                        in1: in1,
                        in2: in2,
                        in3: in3,
                        studentid: studentid}
                })
                    .done (function (res) {
                        if (res == 1) {
                            console.log('ok');
                        } else {
                            swal({
                                text: "Error to upload your receipt, Please check your inputs !!",
                                icon: "error"
                            })
                        }
                    })
            })
        })
    </script>
    </body>
    </html>


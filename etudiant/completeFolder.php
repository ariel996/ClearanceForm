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
            <li class="breadcrumb-item active">Complete the Folder</li>
        </ol>

        <!-- The form -->
        <form>
            <div class="row">
                <div class="col-md-5 col-xs-3">
                    <div class="form-group">
                        <input type="text" name="matricule" placeholder="Your Matricule" required class="form-control" data-toggle="tooltip" data-placement="right" title="Your Matricule">
                    </div>
                    <div class="form-group">
                        <input type="date" id="birthdate" name="birthdate" class="form-control" required data-toggle="tooltip" data-placement="right" title="Your birthdate">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="gender" name="gender" data-toggle="tooltip" data-placement="right" title="Your gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="designation" required name="designation" data-toggle="tooltip" data-placement="right" title="Statut">
                            <option value="Private">Private</option>
                            <option value="Official">Official</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-5 col-xs-3">
                    <div class="form-group">
                        <input type="text" name="names" class="form-control" required placeholder="Your names (As in your Birth certificate)" data-toggle="tooltip" data-placement="right" title="Your names as in your Birth Certificate">
                    </div>
                    <div class="form-group">
                        <input type="tel" name="contactno" class="form-control" required placeholder="Your contact number" data-toggle="tooltip" data-placement="right" title="Your contact number">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" required placeholder="address@example.com" data-toggle="tooltip" data-placement="right" title="Your email address">
                    </div>
                    <div class="form-group">
                        <select name="cycle" id="cycle" class="form-control" required>
                            <option value="Select a cycle (1 or 2)" disabled="disabled" selected="selected">Select a cycle (1 or 2)</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-xs-3">
                    <div class="form-group">
                        <select name="schoolName" class="form-control" id="schoolId" onChange="getDepartment(this.value);">
                            <option value="Select a school" selected="selected" disabled="disabled">Select a school</option>
                            <?php
                            include '../connect.php';
                            $sql = "SELECT * FROM school";
                            $query = $conn->query($sql);
                            while ($row = $query->fetch()) {
                                ?>
                            <option value="<?php echo $row['school_id']; ?>"><?php echo $row['school_code']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="col-md-5 col-xs-3">
                    <div class="form-group">
                        <select class="form-control" id="department" name="department" title="Your Department">
                            <option value="Select a department" disabled="disabled" selected="selected">Select a department</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-outline-danger">Cancel</button>
                <button type="button" class="btn btn-outline-success" id="saveStudent"><i class="fa fa-fw fa-save"></i> Save</button>
            </div>
        </form>
    </div>
</div>
<!-- container fluid -->
<!-- content wrapper -->
<?php
include 'footer.php';
?>

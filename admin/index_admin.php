<?php
/**
 * Created by PhpStorm.
 * User: Ariel Nana
 * Date: 26/12/2017
 * Time: 13:53
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

$sql = "SELECT * FROM users WHERE user_id = $session_id";
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
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../css/adminstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
    <link rel="icon" href="../img/uba.png">

</head>
<body>
<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Admin Dashboard</h3>
            <strong>Uba</strong>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-home"></i>
                    Home
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li><a href="#">Home 1</a></li>
                    <li><a href="#">Home 2</a></li>
                    <li><a href="#">Home 3</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-list"></i>
                    About
                </a>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-duplicate"></i>
                    Pages
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li><a href="#">Page 1</a></li>
                    <li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-link"></i>
                    Portfolio
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-paperclip"></i>
                    FAQ
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-send"></i>
                    Contact
                </a>
            </li>
        </ul>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <i class="fa fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                </div>

                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link"><?php echo $username; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-danger" href="../logout.php" title="Logout"><i class="fa fa-power-off"></i></a>
                    </li>
                </ul>

            </div>
        </nav>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><button class="btn btn-primary" type="button" title="Add new School" data-toggle="modal" data-target="#school">Add School</button></li>
                <li class="breadcrumb-item"><button class="btn btn-info" type="button" title="Add new Department" data-toggle="modal" data-target="#department">Add Department</button></li>
                <li class="breadcrumb-item"><button class="btn btn-danger" type="button" title="add new user">Add new user</button></li>
                <?php
                include 'modal_addDepartment.php';
                include 'modal_addSchool.php';
                ?>
            </ol>

        <div class="row">
            <?php
            for ($i = 1; $i <= 10; $i++) {
                $sql = "SELECT * FROM school WHERE school_id = ?";
                $query = $conn->prepare($sql);
                $query->execute(array($i));
                $row = $query->fetch();

                $requete = "SELECT * FROM department WHERE school_id = $row[0]";
                $qq = $conn->query($requete);
                $count = $qq->rowCount();

                echo "
<div class='col-md-4 col-xs-3'>
                <div class='card'>
                    <div class='card-header'> <strong>$row[2]</strong> ($row[1])</div>
                    <div class='card-body'>
                        <h5 class='card-title'>Total number of department:  $count </h5>
                        <a href='#' class='btn btn-outline-primary'>View list</a>
                    </div>
                </div>
            </div>";}
            ?>

        </div>

        <div class="line"></div>
    </div>
</div>





<!-- jQuery CDN -->
<script src="../js/jquery-3.1.1.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

        // Save school modal
        $('#saveSchool').click(function(e) {
            e.preventDefault();
            // Declaration of variables
            var schoolName = $.trim($('input[name="SchoolName"]').val());
            var schoolCode = $.trim($('input[name="SchoolCode"]').val());

            if (schoolCode == '' || schoolName == '') {
                swal({
                    text: "Verify your inputs !",
                    icon: "error"
                })
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'addSchool.php',
                    data: {schoolName: schoolName, schoolCode: schoolCode}
                })
                    .done(function(res) {
                        if (res == 1) {
                            console.log('ok add school');
                        } else {
                            swal({
                                text: "Failed to add new school ",
                                icon: "error"
                            })
                        }
                    })
            }
        })

        $("#saveDepart").click(function(e) {
            e.preventDefault();

            // Declaration of variables
            $departName = $.trim($('input[name="departmentName"]').val());
            $departCode = $.trim($('input[name="departmentCode"]').val());
            $schoolid = $.trim($('input[name="schoolid"]').val());

            $.ajax({
                type: 'POST',
                url: 'addDepartment.php',
                data: {departName: departName, departCode: departCode, schoolid: schoolid}
            })
                .done(function(res) {
                    if (res == 1) {
                        console.log('department added successfully');
                    } else {
                        console.log('error to add department');
                    }
                })
        })
    });

    function getSchool(val) {
        $.ajax({
            type: 'POST',
            url: 'getSchool.php',
            data: 'depart_id='+val,
            success: function(data) {
                $("#showSchool").html(data);
            }
        });
    }
</script>
</body>
</html>


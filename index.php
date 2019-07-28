<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/html" href="css/sweetalert.css">
    <link rel="icon" href="img/uba.png">
    <title>Online Clearance</title>
</head>
<body id="home">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">Clearance Form UniBda</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a  class="nav-link"><button class="btn btn-outline-success" id="createAccount"> Create an account</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"><button class="btn btn-outline-primary" id="buttonLogin"> Log In</button> </a>
            </li>
        </ul>
    </div>
</nav>

<!-- HOME SECTION -->
<header id="home-section">
    <div class="dark-overlay">
        <div class="home-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 d-none d-lg-block">
                        <h1 class="display-4">Online <strong>clearance form</strong></></h1>
                        <div class="d-flex flex-row">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                Sign your clearance form online
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                Verify the status of your clearance
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                Pay your graduation robe with Mobile Money
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-primary text-center card-form" id="registration">
                            <div class="card-body">
                                <h3>Are you student ?</h3>
                                <h4>Sign Up Here</h4>
                                <p>Please fill out this form to register</p>
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control from-control-lg" placeholder="Username" name="username" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control from-control-lg" placeholder="Password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control from-control-lg" placeholder="Confirm Password" name="cpassword" required>
                                    </div>
                                    <input type="submit" class="btn btn-outline-light btn-block" value="Submit" id="inscrire">
                                </form>
                            </div>
                        </div>

                        <div class="card bg-success text-center card-form" id="authentification">
                            <div class="card-body">
                                <h3>Log In Here</h3>
                                <form>
                                    <div class="form-group">
                                        <select class="form-control form-control-lg" name="usertype" id="usertype">
                                            <option value="student">student</option>
                                            <option value="designee">designee</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nomuser" class="form-control form-control-lg" placeholder="Username" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="passworduser" class="form-control form-control-lg" placeholder="Password">
                                    </div>
                                    <input type="submit" class="btn btn-outline-light btn-block" value="Sign In" id="login">
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- EXPLORE HEAD --->
<section id="explore-head-section">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                &copy;2018 University of Bamenda
            </div>
        </div>
    </div>
</section>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script>
    jQuery(function(){
        $("#createAccount").click(function() {
            $("#authentification").hide();
            $("#registration").show();
        });
        $("#buttonLogin").click(function() {
            $("#authentification").show();
            $("#registration").hide();
        });

        $("#login").click(function(e) {
            e.preventDefault();
            // Declaration of variables that will hold our data
            var username = $.trim($('input[name="nomuser"]').val());
            var userpass = $('input[name="passworduser"]').val();
            var usertype = $('#usertype').val();

            switch (usertype) {
                case 'student':
                    $.ajax({
                        type: 'POST',
                        url: 'loginStudent.php',
                        data: {username: username, userpass: userpass}
                    })
                        .done(function(res) {
                            if (res == 1) {
                                window.location.href="etudiant/index.php";
                            } else {
                                swal({
                                    text: "Student Login failed",
                                    icon: "error"
                                })
                                $('input[name="username"]').focus();
                                $('input').val('');
                            }
                        })
                    break;
                case 'admin':
                    $.ajax({
                        type: 'POST',
                        url: 'loginAdmin.php',
                        data: {username: username, userpass: userpass}
                    })
                        .done(function(res) {
                            if (res == 1) {
                                window.location.href="admin/index_admin.php";
                            } else {
                                 swal({
                                    text: "Admin Login failed",
                                    icon: "error"
                                })
                                $('input[name="username"]').focus();
                                $('input').val('');
                            }
                        })
                    break;
                case 'designee':
                    $.ajax({
                        type: 'POST',
                        url: 'loginDesignee.php',
                        data: {username: username, userpass: userpass}
                    })
                        .done(function(res) {
                            if (res == 1) {
                                console.log('ok designee');
                            } else {
                                swal({
                                    text: "Login failed",
                                    icon: "error"
                                })
                                $('input[name="username"]').focus();
                                $('input').val('');
                            }
                        })
            }
        })

        $("#authentification").hide();
        $('#inscrire').click(function(e){
            e.preventDefault();
            var uname = $.trim($('input[name="username"]').val());
            var pass = $('input[name="password"]').val();
            var cpass = $('input[name="cpassword"]').val();

            if ((pass != cpass) || pass == '' || uname == '') {
                swal({
                    text: "Please fill your inputs",
                    icon: "warning",
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'signup.php',
                    data: {username: uname, userpass: pass}
                })
                    .done(function(res) {
                        console.log(res);
                        if (res == 1 ){
                            $('input').val('');
                            $("#registration").hide();
                            $("#authentification").show();
                        } else {
                            swal({
                                text: "Login failed",
                                icon: "error"
                            })
                            $('input[name="username"]').focus();
                            $('input').val('');
                        }
                    })
            }
        })
    })
</script>
</body>
</html>

<!DOCTYPE html>
<html>
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/resources/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/resources/css/login.css" />
    <link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/resources/css/magic.css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body >

<!-- PAGE CONTENT -->
<div class="container">

    <div id ="message" class="success"></div>

    <div class="tab-content">
        <div id="login" class="tab-pane active">

            <!-- LOGIN FORM -->
            <form action="<?php echo SITE_ROOT; ?>/login" class="formInsert form-signin" method="post">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your email and password
                </p>
                <input name="tb_email" type="text" placeholder="Email" class="form-control" />
                <input name="tb_password" type="password" placeholder="Password" class="form-control" />
                <button id="submit" class="submit btn text-muted text-center btn-danger" type="submit">Sign in</button>
            </form>
            <!-- END LOGIN FORM -->

        </div>
        
        <div id="signup" class="tab-pane">

            <!-- REGISTER FORM -->
            <form action="<?php echo SITE_ROOT; ?>/admin-insert" class="formRegister form-signin" method="post">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Please Fill Details To Register
                </p>
                <input name="tb_name" type="text" placeholder="First Name" class="form-control" />
                <input name="tb_surname" type="text" placeholder="Last Name" class="form-control" />
                <input name="tb_email" type="email" placeholder="Your E-mail" class="form-control" />
                <input name="tb_password" type="password" placeholder="password" class="form-control" />
                <input name="tb_cpassword" type="password" placeholder="Re type password" class="form-control" />
                <button id="submit_register" class="btn text-muted text-center btn-success" type="submit">Register</button>
            </form>
            <!-- END REGISTER FORM -->

        </div>
    </div>

    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Register</a></li>
        </ul>
    </div>

</div>
<!--END PAGE CONTENT -->

<!-- PAGE LEVEL SCRIPTS -->
<script src="<?php echo SITE_ROOT; ?>/resources/js/jquery-2.0.3.min.js"></script>
<script src="<?php echo SITE_ROOT; ?>/resources/js/bootstrap.min.js"></script>
<script src="<?php echo SITE_ROOT; ?>/resources/js/login.js"></script>
<!--END PAGE LEVEL SCRIPTS -->

<script type="text/javascript">

    // Login User
    $('#submit').click(function(e){

        e.preventDefault();
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

        $.ajax({

            url: $('.formInsert').attr('action'),
            type: $('.formInsert').attr('method'),
            data: $('.formInsert').serialize(),
            dataType: 'json',

            success: function(response) {
                console.log(response);
                if(response.error == false){

                    if (response.redirect) {

                        window.location.href = response.redirect;
                    }

                } else {
                    
                    $("#message").html(response.message ).addClass( "alert alert-danger alert-dismissable" );
                }
                console.log(response);
            }
        });
    });

    // Register User
    $('#submit_register').click(function(e){

        e.preventDefault();
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

        $.ajax({

            url: $('.formRegister').attr('action'),
            type: $('.formRegister').attr('method'),
            data: $('.formRegister').serialize(),
            dataType: 'json',

            success: function(response) {
                console.log(response);
                if(response.error == false){

                    if (response.redirect) {

                        window.location.href = response.redirect;
                    }

                } else {

                    $("#message").html(response.message ).addClass( "alert alert-danger alert-dismissable" );
                }
                console.log(response);
            }
        });
    });
</script>
</body>
<!-- END BODY -->
</html>

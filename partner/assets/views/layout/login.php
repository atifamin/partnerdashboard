<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo e('pKanban', true); ?></title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/favicon.ico">

    <link href="<?php echo base_url(); ?>template/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>template/css/login.css" rel="stylesheet">

    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" data-noprefix>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>


<body>
<div class="container">
    <div class="card card-container">

        <p class="brand"><?php echo e('pKANBAN', true); ?></p>
        <p class="pay_off"><?php echo e('Your personal task board', true); ?></p>
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
        <!--<p id="profile-name" class="profile-name-card">User</p>-->
        <form class="form-signin" action="<?php echo base_url(); ?>access/login" method="post">
            <span id="reauth-email" class="reauth-email"></span>

            <?php if ($this->config->item('demo_mode') == TRUE): ?>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="<?php echo e('Email address', true); ?>"
                       required autofocus value="demo@pkanban.com">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="<?php echo e('Password', true); ?>"
                       required value="demo">
            <?php else: ?>

                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="<?php echo e('Email address', true); ?>"
                       required autofocus>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="<?php echo e('Password', true); ?>"
                       required value="admin">
            <?php endif; ?>

            <!--<div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" name="remember" value="true"> Remember me

                </label>
            </div>-->
            <p class="error_danger"><?php echo (isset($error)) ? $error : null; ?></p>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit"><?php echo e('Login', true); ?></button>

            <?php if ($this->config->item('demo_mode') == TRUE): ?>
            <p style="text-align:center">Demo access:</p>
            <p>
                Login: demo@pkanban.com<br/>
                Password: demo</p>
            <?php endif; ?>

        </form><!-- /form -->
        <!--<a href="#" class="forgot-password">
            Forgot the password?
        </a>-->
    </div><!-- /card-container -->
</div><!-- /container -->
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->config->base_url()."css/style_a.css"?>">
    <title>PICSTORAGE | Login</title>
</head>
<body>
    <div class="user-block">
        <?php 
            print_r($_SESSION);
            echo $error;
            echo $success;
            echo validation_errors(); 
        ?>
        <form action="<?=base_url()?>form/login" method="post">
            <div class="input">
                <label for="uname">Email</label>
                <input type="email" name="email">
            </div>
            <div class="input">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
            <div class="input">
                <input type="submit" value="Login" name="Login">
            </div>
        </form>
    </div>
</body>
</html>
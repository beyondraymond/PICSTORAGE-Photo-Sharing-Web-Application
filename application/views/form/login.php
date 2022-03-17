<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Picstorage | Login</title>
    <!-- Modified css -->
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            background: linear-gradient(90deg, rgba(3, 3, 2, 0.6), rgba(3, 3, 2, 0.6)),  url('<?=base_url()?>/frontend_img/picstorage_index.jpeg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
        }
        
        .jumbotron{
            background-color: #ebefffd9 !important;
            border-radius: 10px;
            width: 85%;
        }

        .toast {
            max-width: 100%;
        }
    </style>
    </head>
    <body>
    <?php 
        if (!empty($error)):
    ?>
    <div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-autohide="false">
        <div class="toast-header">
            <strong class="mr-auto">Picstorage Security</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?=$error?>
        </div>
    </div>
    <?php
        endif;
    ?>
    <div class="index-body container-fluid">
        <div class="row">
            <div class="col mr-auto">
            </div>
            <div class="col-sm-5 mr-auto my-5 mt-5">
                <div class="jumbotron">
                    <form method="post" action="<?php echo base_url()?>form/login" class="pb-5 px-4">
                    <h2>Picstorage</h2>
                    <p>Store your photos, share your photos</p>
                    <hr class="my-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?php $this->input->post('UN'); ?>" placeholder="Email" />
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="Submit" class="btn btn-primary float right" value="Login" name="Login"/>
                    </div>
                    <span>No account yet? <a href="<?php echo site_url('form/register')?>" class="signup">Sign up</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.toast').toast('show');
    </script>
    </body>
</html>
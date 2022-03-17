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
                width: 60%;
            }
            </style>
    <title>Picstorage | Registration</title>
    </head>
    <body class="d-flex align-items-center">
    <div class="container-fluid">
        <div class="jumbotron mx-auto">    
            <form method="post" action="<?=base_url()?>form/register" enctype="multipart/form-data">
            <div class="form-group">
                    <h2>Create Picstorage Account</h2>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" />
                        <span class="text-danger"><?php echo form_error('firstname'); ?></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name" />
                        <span class="text-danger"><?php echo form_error('lastname'); ?></span>
                    </div>
                </div>
            </div>             
            <div class="form-group">   
                <label for="email">Email Address</label>
                <input type="text" name="email" class="form-control form-control" id="email" placeholder="Email Address" />
                <span class="text-danger"><?php echo form_error('email'); ?></span>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password" />
                        <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
                    </div>
                </div>
            </div>
            
            <div class="form-group mt-2">   
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="upload-label">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name ="profilepic" class="custom-file-input" id="profilepic" aria-describedby="profilepic" />
                        <label class="custom-file-label" for="profilepic">Choose file</label>
                    </div>
                </div>
                <script>
                    document.querySelector('.custom-file-input').addEventListener('change', function (e) {
                        var name = document.getElementById("profilepic").files[0].name;
                        var nextSibling = e.target.nextElementSibling
                        nextSibling.innerText = name
                    })
                </script>
                <?php
                    if ($this->session->flashdata('error_msg') )
                    {
                        echo "<span class=\"text-danger\">";
                        echo $this->session->flashdata('error_msg');
                        echo "</span>";
                    }
                ?>
                <div class="form-group mt-4 text-right">
                    <input type="Submit" class="btn btn-primary" value="Register" name="Submit"/>
                </div>
                <div class="form-group mt-3">
                    <a href="<?php echo site_url('form/login')?>"><span class="pt-5">Already have an account? Login</span></a>
                </div>
            </div>
            </form>   
        </div>
    </div>
    </body>
</html>
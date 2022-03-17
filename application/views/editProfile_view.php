<html>
<head>
<title>Edit Profile | Picstorage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url()?>css/editPhotoStyle.css">
    <link rel="stylesheet" type ="text/css" href="<?=base_url(); ?>css/homepageStyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        //DEBUG 
        //print_r($user_info); 
    ?>
    <section class="text-center my-5">
            <header class="text-white text-center">
                <h1 class="display-4 mb-2">Edit Account Details</h1>
            </header>
            <div class="row">
                <div class="col-md-4"></div>

                <div class="col-md-4 text border border-primary text-left bg-white">
                    <div class="mt-4 text-center">
                    <img src="<?=base_url()?>uploads/<?=$user_info[0]->profile_pic?>" class="banner-img" srcset="" height="150px">
                    </div>
                
                    <form enctype='multipart/form-data' class="text-left" action="<?php echo site_url('homepage/editProfile')?>" method="post" id="user-form" class = "text-center mb-4">
                    <h5 class="text-left mt-4">Edit Details</h5>
                    <div class="form-group row text-left">
                        <label class="col-sm-5 col-form-label">First Name</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" name="fName" value="<?=set_value('fName', $user_info[0]->first_name);?>">
                        <?=form_error('fName', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row text-left">
                        <label class="col-sm-5 col-form-label">Last Name</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" name="lName" value="<?=set_value('lName', $user_info[0]->last_name);?>">
                        <?=form_error('lName', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row text-left">
                        <label class="col-sm-5 col-form-label">Email</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" name="email" value="<?=set_value('email', $user_info[0]->email);?>">
                        <?=form_error('email', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row text-left">
                        <label class="col-sm-5 col-form-label">Password</label>
                        <div class="col-sm-7">
                        <input type="password" class="form-control" name="password">
                        <?=form_error('password', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row text-left">
                        <label class="col-sm-5 col-form-label">Confirm Password</label>
                        <div class="col-sm-7">
                        <input type="password" class="form-control" name="confirmPassword">
                        <?=form_error('password', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row text-left">
                        <label class="col-sm-5 col-form-label">Profile Picture</label>
                        <div class="col-sm-7">
                        <input type="file" class="form-control" name="image" value="<?=base_url()."uploads/".set_value('email', $user_info[0]->profile_pic);?>">
                        <?php if (!empty($error)) {
                            foreach($error as $val){
                                echo '<div class="alert alert-danger">';
                                echo $val;
                                echo '</div>';
                            }
                        }?>
                        </div>
                    </div>
                    <?php if(!empty($success)) {
                        echo "<p class='alert alert-success'>$success</p>";
                    }
                    ?>
                    <button type="submit" name="editProfile" class="btn btn-primary btn-block mb-4">UPDATE DETAILS</button>
                    </form>
                </div>

                <div class="col-md-4"></div>
            </div>       
    </section>
</body>
</html>
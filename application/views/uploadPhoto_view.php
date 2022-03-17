<html>
<head>
    <title>Upload Photo | Picstorage</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/editPhotoStyle.css">
    <link rel="stylesheet" type ="text/css" href="<?=base_url(); ?>css/homepageStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php print_r($error) ?>
    <div class="container py-5">
    <header class="text-white text-center">
        <h1 class="display-4">Upload New Image</h1>
        <p class="lead mb-0">Share your creations to the world by uploading a new photo.</p>
    </header>
    <div class="row py-4">
        <div class="col-lg-6 mx-auto">
        <form enctype='multipart/form-data' action="<?php echo site_url('homepage/uploadImage')?>" method="post" id="user-form">
            <!-- Upload image input-->
            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                <input id="upload" type="file" class="form-control border-0" name="image">
                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                <div class="input-group-append">
                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                </div>
            </div>
            <!-- Uploaded image area-->
            <p class="font-italic text-white text-center">Your selected image will be rendered inside the box below.</p>
            <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
            <?php if(!empty($success)) {
                echo "<p class='alert alert-success'>$success</p>";
            }
            ?>
            <?php if (!empty($error)) {
                foreach($error as $val){
                    echo '<div class="alert alert-danger">';
                    echo $val;
                    echo '</div>';
                }
            }?>
            <input id="tags" type="text" class="form-control border-0" name="tags" placeholder="Enter tags here (ex. flowers beautiful colorful)">
            <?=form_error('tags', '<div class="alert alert-danger">', '</div>'); ?>
            <button type="submit" name="upload-submit" class="btn btn-light btn-block mt-4">UPLOAD</button> 
        </form>
        </div>
    </div>
    </div>
    <script src="<?php echo base_url(); ?>js/uploadImage.js"></script>
</body>
</html>
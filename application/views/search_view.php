<html>
<head>
    <title>Search for the "<?php echo $result_title?>" | PICSTORAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/homepageStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
      //DEBUG
      // print_r($user_uploads); 
    ?>
    <section>
    <h1 class="lead text-center">Search Results for "<?php echo $result_title?>"</h1>
    <?php
      if (!empty($user_uploads)):
    ?>
      <div class="container">
        <div class="grid">
        <?php 
          foreach($user_uploads as $picture): 
        ?>
          <div class="grid-item">
            <div class="box">
                <div class="imgBox">
                <img src="<?=base_url()?>uploads/<?=$picture->picture_name?>">
                </div>
                <div class="details">
                  <div class="content text-center">
                    <!-- View Modal Button -->
                    <button type="button" class="btn btn-primary mb-2" title="View" data-toggle="modal" data-target="#pictureModal<?=$picture->picture_id?>" onclick="location.href = '<?=base_url()?>search/view/picture_id/<?=$picture->picture_id?>'">
                      <i class="fa fa-eye"></i> View
                    </button>
                  </div>
                </div>
            </div>
          </div>
        <?php 
          endforeach; 
        ?>
        </div>  
      </div>
    <?php
      else:
    ?>
      <div class="container">
        <h1 class="lead text-center">Sorry, we can't find what you're looking for.</h1>
      </div>
    <?php
      endif;
    ?>
  </section>
  <?php echo $links ?>
  <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
  <script>
  var elem = document.querySelector('.grid');
  var msnry = new Masonry( elem, {
    itemSelector: '.grid-item',
    columnWidth: 200,
    gutter: 10,
    fitWidth: true
  });
  </script>
</body>
</html>
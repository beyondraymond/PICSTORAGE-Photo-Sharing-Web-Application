<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?=base_url(); ?>css/homepageStyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?=$picture_data[0]->picture_name?> | Picstorage</title>
</head>
<body>
    <div class="container text-center">
        <h1><?=$picture_data[0]->picture_name?></h1>
        <h5>
        <?php
          foreach($picture_tags as $tags){
            echo "<span class='badge badge-primary'>".$tags."</span> ";
          }
        ?>
        </h5>
        <img src="<?=base_url()?>uploads/<?=$picture_data[0]->picture_name?>" class="img-thumbnail">
        <br>
        <span class="fa fa-eye"> <?=$picture_data[0]->views?> </span> Views
        <br>
        <span class="fa fa-thumbs-o-up" id="like"> <?=$picture_data[0]->likes?> </span> Likes
    </div>
  <section>
    <div class="container">
        <h1>Similar Photos</h1>
        <p class="text-danger text-center my-2"><?=$prompt; ?></p>
        <?php
            if (!empty($similar)):
        ?>
        <div class="grid">
        <?php 
            foreach($similar as $picture):
              if($picture->picture_id == $curr_picture['picture_id']){
                continue;
              }
        ?>
        <div class="grid-item">
            <div class="box">
                <div class="imgBox">
                <img src="<?=base_url()?>uploads/<?=$picture->picture_name?>">
                </div>
                <!-- Temporary Implementation of "Post Module" Start -->
                <div class="details">
                  <div class="content">
                    <!-- View Button -->
                    <button type="button" class="btn btn-primary mb-2" title="View" data-toggle="modal" data-target="#pictureModal<?=$picture->picture_id?>" onclick="location.href = '<?=base_url()?>search/view/picture_id/<?=$picture->picture_id?>'">
                      <i class="fa fa-eye"></i> View
                    </button>
                    <!-- Delete Button -->
                    <?php if ($this->session->userdata('userId') == $picture->user_id): ?>
                      <button type="button" class="btn btn-danger" title="Delete" onclick="location.href = '<?=base_url()?>homepage/deleteImage/<?=$picture->picture_id?>'">
                        <i class="fa fa-trash-o"></i> Delete
                      </button>
                    <?php endif; ?>
                  </div>
                </div>
                <!-- Modal -->
                <!-- Temporary Implementation of "Post Module" End -->
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
        <h1 class="lead text-center">No similar photos!</h1>
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
  <script>
    $(document).ready(() => {
        $("span#like").click(() => {
          if ($("span#like").hasClass("fa fa-thumbs-o-up")){
            $("span#like").removeClass("fa fa-thumbs-o-up").addClass("fa fa-thumbs-up");
            var currLikeCount = $("span#like").text()
            $.ajax({
              url: "<?=base_url().'search/addLike/'.$picture_data[0]->picture_id?>",
              success: () => {
                $("span#like").text(parseInt(currLikeCount) + 1);
                console.log(currLikeCount);
              }
            });
          }else {
            $("span#like").removeClass("fa fa-thumbs-up").addClass("fa fa-thumbs-o-up");
            var currLikeCount = $("span#like").text()
            $.ajax({
              url: "<?=base_url().'search/removeLike/'.$picture_data[0]->picture_id?>",
              success: () => {
                console
                $("span#like").text(parseInt(currLikeCount) - 1);
                console.log(currLikeCount);
              }
            });
          }
        })
    });
  </script>
</body>
</html>
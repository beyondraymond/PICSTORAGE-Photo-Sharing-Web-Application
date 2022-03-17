<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
        print_r($tags);
    ?>

    <form action="<?=base_url()?>homepage/testtags" method="post">
        <input type="text" name="tags">
        <input type="submit" value="SUbmit">
    </form>
</body>
</html>
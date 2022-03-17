<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <title>Email Verification | Picstorage</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Manrope', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            color: white;
            background-image: url('<?=base_url()?>/frontend_img/picstorage_index.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            text-shadow: 1px 1px black;
        }

        a {
            font-weight: 800;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <h1>You're almost there!</h1>   
    <p>Using this <a href="<?=base_url()."form/verify/".$verification_code?>">link</a> you are one step away from sharing your moments!</p>
    <p>📸</p>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Học tiếng Đức với Decamy, tự học tiếng Đức online</title>
<link rel="icon" href="./public/img/favicon-decamy-637031281346427270.ico">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./public/css/style2.css">
<link rel="stylesheet" href="./public/css/font.css">
<!-- <link rel="icon" href="https://www.harper7coffee.com/images/favicon.ico" type="image/x-icon"> -->
<link rel="stylesheet" href="./public/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php require_once('config.php')?>
<body>
    <div class="position-relative overflow-hidden">
        <?php require_once('content.php')?>
    </div>
    <?php require_once('script.php')?>
</body>
</html>
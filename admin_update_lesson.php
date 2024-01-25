<?php

@include 'config.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$result = mysqli_query($conn,'SELECT * FROM kynang WHERE id = '.$id);
$row = mysqli_fetch_assoc($result);
?>
<?php
    if(isset($_POST) && $_POST){
        header('Content-Type: application/json');
        if($_POST['update']){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $sql = "UPDATE `kynang` SET name = '$name' WHERE id = ".$id;
            // var_dump($sql); die;
            $insert = mysqli_query($conn,$sql);
            if($insert){
                // echo json_encode(['res' => 'success','title' => 'Thông báo thêm kỹ năng', 'icon' => 'success', 'text' => 'Thêm kỹ năng thành công']);            
                echo json_encode(['res' => 'success','title' => 'Thông báo sửa kỹ năng', 'icon' => 'success', 'text' => 'Sửa kỹ năng thành công']);
                exit;
            }else{
                echo json_encode(['res' => 'error','title' => 'Thông báo sửa kỹ năng', 'icon' => 'error', 'text' => 'Sửa kỹ năng thất bại']);
                exit;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ẾCH HỌC BÀI</title>
    <link rel="website icon" type="png" href="./public/img/logo.png">
    <!-- Style CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&family=Sen:wght@700&display=swap" rel="stylesheet">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/> -->
    <!-- <link rel="stylesheet" href="./public/css/style.css"> -->
    <!-- <link rel="stylesheet" href="./public/css/style1.css"> -->
    <link rel="stylesheet" href="./public/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>

<?php include 'header_admin.php'; ?>

    
<div class="container">

<!-- Begin Page Content -->
<div class="container-fluid mt-5">
    <!-- Page Heading -->
    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-2 text-secondary">Sửa kỹ năng</h1>
        </div>
        <div class="card-body">
            <form class="change-lesson" data-id="<?=$id?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tên kỹ năng</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?=$row['name']?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button> -->
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

<?php require_once('admin_footer.php')?>
</body>
</html>
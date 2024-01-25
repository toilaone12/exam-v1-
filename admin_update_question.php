<?php

@include 'config.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$result = mysqli_query($conn,'SELECT * FROM cauhoi WHERE id = '.$id);
$row = mysqli_fetch_assoc($result);
?>
<?php
    if(isset($_POST) && $_POST){
        header('Content-Type: application/json');
        if($_POST['update']){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $answer_a = $_POST['answer_a'];
            $answer_b = $_POST['answer_b'];
            $answer_c = $_POST['answer_c'];
            $answer_d = $_POST['answer_d'];
            $answer = $_POST['answer'];
            $sql = "UPDATE `cauhoi` SET name = '$name', answer_a = '$answer_a', answer_b = '$answer_b', answer_c = '$answer_c', answer_d = '$answer_d', answer = '$answer' WHERE id = ".$id;
            // var_dump($sql); die;
            $insert = mysqli_query($conn,$sql);
            if($insert){
                // echo json_encode(['res' => 'success','title' => 'Thông báo thêm câu hỏi', 'icon' => 'success', 'text' => 'Thêm câu hỏi thành công']);            
                echo json_encode(['res' => 'success','title' => 'Thông báo sửa câu hỏi', 'icon' => 'success', 'text' => 'Sửa câu hỏi thành công']);
                exit;
            }else{
                echo json_encode(['res' => 'error','title' => 'Thông báo sửa câu hỏi', 'icon' => 'error', 'text' => 'Sửa câu hỏi thất bại']);
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
            <h1 class="h3 mb-2 text-secondary">Sửa câu hỏi</h1>
        </div>
        <div class="card-body">
            <form class="change-question" data-id="<?=$id;?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tên câu hỏi</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= $row['name'] ?>" placeholder="Câu hỏi" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="answer_a">Lựa chọn A</label>
                                <input type="text" name="answer_a" id="answer_a" value="<?= $row['answer_a'] ?>" class="form-control" placeholder="Lựa chọn A" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="answer_b">Lựa chọn B</label>
                                <input type="text" name="answer_b" id="answer_b" value="<?= $row['answer_b'] ?>" class="form-control" placeholder="Lựa chọn B" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="answer_c">Lựa chọn C</label>
                                <input type="text" name="answer_c" id="answer_c" value="<?= $row['answer_c'] ?>" class="form-control" placeholder="Lựa chọn C">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="answer_d">Lựa chọn D</label>
                                <input type="text" name="answer_d" id="answer_d" value="<?= $row['answer_d'] ?>" class="form-control" placeholder="Lựa chọn D">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Đáp án</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer" value="A" id="flexRadioDefaultA" <?= $row['answer'] == 'A' ? 'checked' : ''?>>
                                <label class="form-check-label" for="flexRadioDefaultA">
                                    A
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer" value="B" id="flexRadioDefaultB" <?= $row['answer'] == 'B' ? 'checked' : ''?>>
                                <label class="form-check-label" for="flexRadioDefaultB">
                                    B
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer" value="C" id="flexRadioDefaultC" <?= $row['answer'] == 'C' ? 'checked' : ''?>>
                                <label class="form-check-label" for="flexRadioDefaultC">
                                    C
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer" value="D" id="flexRadioDefaultD" <?= $row['answer'] == 'D' ? 'checked' : ''?>>
                                <label class="form-check-label" for="flexRadioDefaultD">
                                    D
                                </label>
                            </div>
                        </div>
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
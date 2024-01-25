<?php

@include 'config.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$result = mysqli_query($conn,'SELECT * FROM baikiemtra WHERE id = '.$id);
$row = mysqli_fetch_assoc($result);
$resultLevel = mysqli_query($conn,'SELECT * FROM trinhdo');
$resultLesson = mysqli_query($conn,'SELECT * FROM kynang');
$resultAssignment = mysqli_query($conn,'SELECT * FROM debai');
?>
<?php
    if(isset($_POST) && $_POST){
        header('Content-Type: application/json');
        if($_POST['update']){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $id_level = $_POST['id_level'];
            $id_lesson = $_POST['id_lesson'];
            $duration = $_POST['duration'];
            $jsonList = '|';
            foreach($_POST['list'] as $key => $one){
                $jsonList .= $one.'|';
            }
            $sql = "UPDATE `baikiemtra` SET id_level = $id_level, id_lesson = $id_lesson, name = '$name', list_assignment = '$jsonList', duration = $duration WHERE id = ".$id;
            // var_dump($sql); die;
            $insert = mysqli_query($conn,$sql);
            if($insert){
                // echo json_encode(['res' => 'success','title' => 'Thông báo thêm bài kiểm tra', 'icon' => 'success', 'text' => 'Thêm bài kiểm tra thành công']);            
                echo json_encode(['res' => 'success','title' => 'Thông báo sửa bài kiểm tra', 'icon' => 'success', 'text' => 'Sửa bài kiểm tra thành công']);
                exit;
            }else{
                echo json_encode(['res' => 'error','title' => 'Thông báo sửa bài kiểm tra', 'icon' => 'error', 'text' => 'Sửa bài kiểm tra thất bại']);
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
<style>
    .select2-container {
        width: 100% !important;
    }

    .select2-results__option {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* Số dòng muốn hiển thị */
        -webkit-box-orient: vertical;
        overflow: hidden;
        width: 932px;
    }

    #editor {
        height: 700px;
    }

    .text-ellipsis {
        display: -webkit-box;
        -webkit-line-clamp: 6;
        /* Số dòng muốn hiển thị */
        -webkit-box-orient: vertical;
        overflow: hidden;
        width: 500px;
    }
</style>
    
<div class="container">

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-2 text-gray-800">Sửa đề thi</h1>
        </div>
        <div class="card-body">
            <form class="change-exam" data-id="<?=$id?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="level">Loại bằng</label>
                                <select name="id_level" id="level" class="form-control">
                                    <?php
                                        mysqli_data_seek($resultLevel, 0); //tro ve vi tri dau tien
                                        while($rowLevel = mysqli_fetch_assoc($resultLevel)){
                                    ?>
                                    <option value="<?=$rowLevel['id']?>" <?=$rowLevel['id'] == $row['id_level'] ? "selected" : ''?>><?=$rowLevel['name']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="lesson">Loại kỹ năng</label>
                                <select name="id_lesson" id="lesson" class="form-control">
                                    <?php
                                        mysqli_data_seek($resultLesson, 0); //tro ve vi tri dau tien
                                        while($rowLesson = mysqli_fetch_assoc($resultLesson)){
                                    ?>
                                    <option value="<?=$rowLesson['id']?>" <?=$rowLesson['id'] == $row['id_lesson'] ? "selected" : ''?>><?=$rowLesson['name']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group">
                                <label for="name">Tên bài thi</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?=$row['name']?>" required>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="duration">Thời gian bài thi <span class="text-duration">(<?=$row['duration']?> phút)</span></label>
                                <input type="range" name="duration" id="duration" class="form-range w-100 duration-change" min="5" max="120" step="5" value="<?=$row['duration']?>" required>
                                <!-- <input type="number" name="duration" id="duration" class="form-control" required> -->
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <span class="text-white px-2 py-2 bg-primary">Danh sách đề bài</span>
                        <div class="card-body">
                            <select id="multi-assignment" class="form-control w-100" name="list[]" multiple="multiple" required>
                                <?php
                                    $array = explode('|', trim($row['list_assignment'], '|'));
                                    $sqlAssignment = "SELECT * FROM debai";
                                    $resultAssignment = mysqli_query($conn,$sqlAssignment);
                                    while($rowAssignment = mysqli_fetch_assoc($resultAssignment)){   
                                        $isSelected = in_array($rowAssignment['id'], $array);
                                ?>
                                <option value="<?=$rowAssignment['id']?>" <?= $isSelected ? 'selected' : '' ?>>
                                    <?=$rowAssignment['name']?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal">Đóng</button>
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
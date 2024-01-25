<?php

@include 'config.php';
$result = mysqli_query($conn,'SELECT * FROM baikiemtra');
$resultLevel = mysqli_query($conn,'SELECT * FROM trinhdo');
$resultLesson = mysqli_query($conn,'SELECT * FROM kynang');
$resultAssignment = mysqli_query($conn,'SELECT * FROM debai');
?>
<?php
    if(isset($_POST) && $_POST){
        header('Content-Type: application/json');
        if(isset($_POST['insert']) && $_POST['insert']){
            $name = $_POST['name'];
            $id_level = $_POST['id_level'];
            $id_lesson = $_POST['id_lesson'];
            $duration = $_POST['duration'];
            $jsonList = '|';
            foreach($_POST['list'] as $key => $one){
                $jsonList .= $one.'|';
            }
            $check = "SELECT * FROM baikiemtra WHERE name = '$name'";
            $resultCheck = mysqli_query($conn,$check);
            if($resultCheck->num_rows == 0){
                $sql = "INSERT INTO `baikiemtra` VALUES ('',$id_level,$id_lesson,'$name','$jsonList',$duration)";
                // var_dump($sql); die;
                $insert = mysqli_query($conn,$sql);
                if($insert){
                    echo json_encode(['res' => 'success','title' => 'Thông báo thêm bài kiểm tra', 'icon' => 'success', 'text' => 'Thêm bài kiểm tra thành công']);
                    exit;
                }else{
                    echo json_encode(['res' => 'error','title' => 'Thông báo thêm bài kiểm tra', 'icon' => 'error', 'text' => 'Thêm bài kiểm tra thất bại']);
                    exit;
                }
            }else {
                echo json_encode(['res' => 'error', 'title' => 'Thông báo thêm bài kiểm tra', 'icon' => 'warning', 'text' => 'Tên bài kiểm tra này đã tồn tại']);
                exit;
            }
        }else if(isset($_POST['delete']) && $_POST['delete']){
            $id = $_POST['id'];
            $sql = "DELETE FROM `baikiemtra` WHERE id = ".$id;
            // var_dump($sql); die;
            $delete = mysqli_query($conn,$sql);
            if($delete){
                echo json_encode(['res' => 'success','title' => 'Thông báo xóa bài kiểm tra', 'icon' => 'success', 'text' => 'Xóa bài kiểm tra thành công']);
                exit;
            }else{
                echo json_encode(['res' => 'error','title' => 'Thông báo xóa bài kiểm tra', 'icon' => 'error', 'text' => 'Xóa bài kiểm tra thất bại']);
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
    <link rel="stylesheet" href="./public/css/style.css">
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
        z-index: 999999;
    }

    .select2-results__option {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* Số dòng muốn hiển thị */
        -webkit-box-orient: vertical;
        overflow: hidden;
        width: 522px;
    }

    #editor {
        height: 700px;
    }

    .text-ellipsis {
        display: -webkit-box;
        -webkit-line-clamp: 5;
        /* Số dòng muốn hiển thị */
        -webkit-box-orient: vertical;
        overflow: hidden;
        width: 390px;
    }
</style>
<div class="container">

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between my-5">
        <h1 class="h3 mb-2 text-gray-800">Danh sách bài thi</h1>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addExam">Thêm bài thi</button>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách bài thi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên bài thi</th>
                            <th>Loại bằng</th>
                            <th>Loại kỹ năng</th>
                            <th>Danh sách câu hỏi</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $count++;
                        ?>
                        <tr>
                            <td><?=$count?></td>
                            <td><?=$row['name']?></td>
                            <?php
                                mysqli_data_seek($resultLevel, 0); //tro ve vi tri dau tien
                                while($rowLevel = mysqli_fetch_assoc($resultLevel)){
                                    // die;
                                    if($rowLevel['id'] == $row['id_level']){
                            ?>
                            <td><?=$rowLevel['name']?></td>
                            <?php
                                    }
                                }
                            ?>
                            <?php
                                mysqli_data_seek($resultLesson, 0); //tro ve vi tri dau tien
                                while($rowLesson = mysqli_fetch_assoc($resultLesson)){
                                    if($rowLesson['id'] == $row['id_lesson']){
                            ?>
                            <td><?=$rowLesson['name']?></td>
                            <?php
                                    }
                                }
                            ?>
                            <td>
                                <?php
                                    $array = explode('|',trim($row['list_assignment'],'|'));
                                    // var_dump($array);
                                    foreach($array as $key => $id){
                                        $sqlAssignment = "SELECT * FROM debai WHERE id = ".$id;
                                        $resutlAssignment = mysqli_query($conn,$sqlAssignment);
                                        $oneItem = mysqli_fetch_assoc($resutlAssignment);
                                        // $oneItem = Question::find($one);   
                                ?>
                                <div class="d-block">Đề bài số <?=$key+1?>: <span class="text-danger text-ellipsis"><?=$oneItem['name']?></span></div>
                                <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="admin_update_exam.php?id=<?=$row['id']?>" class="btn btn-outline-info fs-15"><i class="fa-solid fa-wrench"></i></a>
                                <a data-id="<?=$row['id']?>" class="btn btn-outline-danger fs-15 delete-exam"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<div class="modal fade" id="addExam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 600px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm bài thi</h5>
                <button type="button" class="border-0 btn btn-outline-secondary close-exam" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <form class="add-exam">
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
                                    <option value="<?=$rowLevel['id']?>"><?=$rowLevel['name']?></option>
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
                                    <option value="<?=$rowLesson['id']?>"><?=$rowLesson['name']?></option>
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
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="duration">Thời gian bài thi <span class="text-duration">(5 phút)</span></label>
                                <input type="range" name="duration" id="duration" class="form-range w-100 duration-change" min="5" max="120" step="5" value="5" required>
                                <!-- <input type="number" name="duration" id="duration" class="form-control" required> -->
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <span class="text-white px-2 py-2 bg-primary">Danh sách bài kiểm tra</span>
                        <div class="card-body">
                            <select id="multi-assignment" class="form-control w-100" name="list[]" multiple="multiple" required>
                                <?php
                                    while($rowAssignment = mysqli_fetch_assoc($resultAssignment)){
                                ?>
                                <option value="<?=$rowAssignment['id']?>" class="text-ellipsis"><?=$rowAssignment['name']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-exam" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<div class="modal fade" id="addAssignment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 600px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm đề tài</h5>
                <button type="button" class="border-0 btn btn-outline-secondary close-assignment" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <form class="add-assignment">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tên đề tài</label>
                        <textarea name="ckeditor" id="" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="card">
                        <span class="text-white px-2 py-2 bg-primary">Danh sách câu hỏi</span>
                        <div class="card-body">
                            <select id="multi-question" class="form-control w-100" name="list[]" multiple="multiple" required>
                                <?php
                                    $sqlAllQuestion = "SELECT * FROM cauhoi";
                                    $resultAll = mysqli_query($conn,$sqlAllQuestion);
                                    while($rowAll = mysqli_fetch_assoc($resultAll)){
                                ?>
                                <option value="<?=$rowAll['id']?>"><?=$rowAll['name']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-assignment" data-bs-dismiss="modal">Đóng</button>
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
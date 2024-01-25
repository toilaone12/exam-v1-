<?php

@include 'config.php';
$result = mysqli_query($conn,'SELECT * FROM debai');
?>
<?php
    if(isset($_POST) && $_POST){
        header('Content-Type: application/json');
        if(isset($_POST['insert']) && $_POST['insert']){
            $name = $_POST['name'];
            $jsonList = '|';
            foreach($_POST['list'] as $key => $one){
                $jsonList .= $one.'|';
            }
            $sql = "INSERT INTO `debai` VALUES ('','$name','$jsonList')";
            // var_dump($sql); die;
            $insert = mysqli_query($conn,$sql);
            if($insert){
                echo json_encode(['res' => 'success','title' => 'Thông báo thêm đề bài', 'icon' => 'success', 'text' => 'Thêm đề bài thành công']);
                exit;
            }else{
                echo json_encode(['res' => 'error','title' => 'Thông báo thêm đề bài', 'icon' => 'error', 'text' => 'Thêm đề bài thất bại']);
                exit;
            }
        }else if(isset($_POST['delete']) && $_POST['delete']){
            $id = $_POST['id'];
            $sql = "DELETE FROM `debai` WHERE id = ".$id;
            // var_dump($sql); die;
            $delete = mysqli_query($conn,$sql);
            if($delete){
                echo json_encode(['res' => 'success','title' => 'Thông báo xóa đề bài', 'icon' => 'success', 'text' => 'Xóa đề bài thành công']);
                exit;
            }else{
                echo json_encode(['res' => 'error','title' => 'Thông báo xóa đề bài', 'icon' => 'error', 'text' => 'Xóa đề bài thất bại']);
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
    .select2-container{
        width: 100% !important;
        z-index: 999999;
    }
    #editor{
        height: 700px;
    }
    .text-ellipsis{
        display: -webkit-box;
        -webkit-line-clamp: 6; /* Số dòng muốn hiển thị */
        -webkit-box-orient: vertical;
        overflow: hidden;
        width: 500px;
    }
</style>
<div class="container">

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between my-5">
        <h1 class="h3 mb-2 text-gray-800">Danh sách đề bài</h1>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addAssignment">Thêm đề bài</button>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách đề bài</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên đề tài</th>
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
                            <td>
                                <div class="d-flex">
                                    <span class="text-ellipsis">
                                        <?=$row['name']?>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <?php
                                    $array = explode('|',trim($row['list_question'],'|'));
                                    // var_dump($array);
                                    foreach($array as $key => $id){
                                        $sqlQuestion = "SELECT * FROM cauhoi WHERE id = ".$id;
                                        $resutlQuestion = mysqli_query($conn,$sqlQuestion);
                                        $oneItem = mysqli_fetch_assoc($resutlQuestion);
                                        // $oneItem = Question::find($one);   
                                ?>
                                <div class="d-block">Câu hỏi 1.<?=$key+1?>: <span class="text-danger"><?=$oneItem['name']?></span></div>
                                <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="admin_update_assignment.php?id=<?=$row['id']?>" class="btn btn-outline-info d-block w-50 fs-15"><i class="fa-solid fa-wrench"></i></a>
                                <a data-id="<?=$row['id']?>" class="btn btn-outline-danger mt-md-2 d-block w-50 fs-15 delete-assignment"><i class="fa-solid fa-trash-can"></i></a>
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
<?php

@include 'config.php';
$result = mysqli_query($conn,'SELECT * FROM cauhoi');
?>
<?php
    if(isset($_POST) && $_POST){
        header('Content-Type: application/json');
        if(isset($_POST['insert']) && $_POST['insert']){
            $name = $_POST['name'];
            $answer_a = $_POST['answer_a'];
            $answer_b = $_POST['answer_b'];
            $answer_c = $_POST['answer_c'];
            $answer_d = $_POST['answer_d'];
            $answer = $_POST['answer'];
            $sql = "INSERT INTO `cauhoi` VALUES ('','$name','$answer_a','$answer_b','$answer_c','$answer_d','$answer')";
            // var_dump($sql); die;
            $insert = mysqli_query($conn,$sql);
            if($insert){
                echo json_encode(['res' => 'success','title' => 'Thông báo thêm câu hỏi', 'icon' => 'success', 'text' => 'Thêm câu hỏi thành công']);
                exit;
            }else{
                echo json_encode(['res' => 'error','title' => 'Thông báo thêm câu hỏi', 'icon' => 'error', 'text' => 'Thêm câu hỏi thất bại']);
                exit;
            }
        }else if(isset($_POST['delete']) && $_POST['delete']){
            $id = $_POST['id'];
            $sql = "DELETE FROM `cauhoi` WHERE id = ".$id;
            // var_dump($sql); die;
            $delete = mysqli_query($conn,$sql);
            if($delete){
                echo json_encode(['res' => 'success','title' => 'Thông báo xóa câu hỏi', 'icon' => 'success', 'text' => 'Xóa câu hỏi thành công']);
                exit;
            }else{
                echo json_encode(['res' => 'error','title' => 'Thông báo xóa câu hỏi', 'icon' => 'error', 'text' => 'Xóa câu hỏi thất bại']);
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

    
<div class="container">

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between my-5">
        <h1 class="h3 mb-2 text-gray-800">Danh sách câu hỏi</h1>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addQuestion">Thêm câu hỏi</button>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách câu hỏi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên câu hỏi</th>
                            <th>Câu trả lời</th>
                            <th>Đáp án</th>
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
                            <td>
                                <div class="d-block">
                                    <span class="text-danger">Lựa chọn A:</span> <?=$row['answer_a']?>
                                </div>
                                <div class="d-block">
                                    <span class="text-danger">Lựa chọn B:</span> <?=$row['answer_b']?>
                                </div>
                                <div class="d-block">
                                    <span class="text-danger">Lựa chọn C:</span> <?=$row['answer_c'] ? $row['answer_c'] : 'Không có'?> 
                                </div>
                                <div class="d-block">
                                    <span class="text-danger">Lựa chọn D:</span> <?=$row['answer_d'] ? $row['answer_d'] : 'Không có'?> 
                                </div>
                            </td>
                            <td>Đáp án: <?=$row['answer']?></td>
                            <td>
                                <a href="admin_update_question.php?id=<?=$row['id']?>" class="btn btn-outline-info fs-15"><i class="fa-solid fa-wrench"></i></a>
                                <a data-id="<?=$row['id']?>" class="btn btn-outline-danger mt-md-2 fs-15 delete-question"><i class="fa-solid fa-trash-can"></i></a>
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
<div class="modal fade" id="addQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm câu hỏi</h5>
                <button type="button" class="border-0 btn btn-outline-secondary close-question" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <form class="add-question">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tên câu hỏi</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Câu hỏi" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="answer_a">Lựa chọn A</label>
                                <input type="text" name="answer_a" id="answer_a" class="form-control" placeholder="Lựa chọn A" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="answer_b">Lựa chọn B</label>
                                <input type="text" name="answer_b" id="answer_b" class="form-control" placeholder="Lựa chọn B" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="answer_c">Lựa chọn C</label>
                                <input type="text" name="answer_c" id="answer_c" class="form-control" placeholder="Lựa chọn C">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="answer_d">Lựa chọn D</label>
                                <input type="text" name="answer_d" id="answer_d" class="form-control" placeholder="Lựa chọn D">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Đáp án</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" checked name="answer" value="A" id="flexRadioDefaultA">
                                <label class="form-check-label" for="flexRadioDefaultA">
                                    A
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer" value="B" id="flexRadioDefaultB">
                                <label class="form-check-label" for="flexRadioDefaultB">
                                    B
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer" value="C" id="flexRadioDefaultC">
                                <label class="form-check-label" for="flexRadioDefaultC">
                                    C
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer" value="D" id="flexRadioDefaultD">
                                <label class="form-check-label" for="flexRadioDefaultD">
                                    D
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-question" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" name="insert">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

<?php require_once('admin_footer.php')?>
</body>
</html>
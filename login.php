<?php

@include 'config.php';

if(isset($_POST['dangnhap'])){
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);



//Kiểm tra tên đăng nhập có tồn tại không
  $query = "SELECT username, password FROM tk WHERE username='$username'";
  $result = mysqli_query($conn, $query);

  if($result){
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($result);
      
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
      echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
      exit;
    }else{
      $queryy = "SELECT * FROM tk WHERE username='$username'";
      $resultt = mysqli_query($conn, $queryy);
    
      if($resultt){
        $roww = mysqli_fetch_array($resultt);
        if($roww['role']==""){
          header('location:index.php');
        }else{
          header('location:admin.php');
        }
      }
    }
  }
else{
  $message[]='username hoac password khong dung ';
  echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="login.php";</script>';
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>
<body>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>' .$message. '</span><i class="fas fa-times" onclick="this.parentElement.style.display=`none`;"></i></div>';
   };
};

?>
<?php include 'header.php'; ?>
      


    <!-- Login -->
    <div class="login container mt-3">
        <h2>ĐĂNG NHẬP</h2>
        <div class="d-flex justify-content-center ">
          <form action="login.php" class="dangnhap was-validated" method='POST'>
            <div class="mb-3 mt-3">
              <label for="uname" class="form-label">Username:</label>
              <input type="text" class="form-control" id="uname" placeholder="Enter username" name='username' required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
      
            <div class="col-12 mb-3">
              <button type="submit" class="btn btn-primary" id="liveAlertBtn" data-bs-toggle="tooltip" title="Submit right now!" name="dangnhap">Đăng nhập</button>
              <div id="liveAlertPlaceholder"></div>
              <br>
              <span>Bạn chưa có tài khoản? Đăng ký <a href="register.php" style="color: red;"><u>tại đây</u></a></span>

            </div>
           
          </form>
        </div>
    </div>



    <?php include 'footer.php'; ?>

</body>
</html>
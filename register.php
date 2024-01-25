<?php
@include 'config.php';

if(isset($_POST['dangky'])){
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $phone = trim($_POST['phone']);
  $gmail = trim($_POST['gmail']);
  
  
  // Kiểm tra username hoặc email có bị trùng hay không
  $sql = "SELECT * FROM tk WHERE username = '$username' OR gmail = '$gmail'";
  
  // Thực thi câu truy vấn
  $result = mysqli_query($conn, $sql);
  
  // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
  if (mysqli_num_rows($result) > 0)
  {
  echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="register.php";</script>';
  
  // Dừng chương trình
  die ();
  }
  else {
    $sql = "INSERT INTO tk (username, password, phone, gmail) VALUES ('$username','$password','$phone','$gmail')";
    $insert_query = mysqli_query($conn, $sql);

    if($insert_query){
      $message[]= 'tk added succesfully';
      header('location:login.php');
    }
    else{
        $message[]='tk could not be added';
        header('location:register.php');
    }
  }
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- Style CSS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&family=Sen:wght@700&display=swap" rel="stylesheet">
        <!-- Icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="./public/css/style.css">
    
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

    <!-- Register -->
    <div class="register container mt-3">
        <h2>ĐĂNG KÝ</h2>
        <div class="d-flex justify-content-center ">
          <form action="register.php" class="dangky was-validated"  method="post">
            <div class="mb-3 mt-3">
              <label for="uname" class="form-label">Username:</label>
              <input type="text" class="form-control" name='username' value="" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">Password:</label>
              <input type="password" class="form-control"  name="password" value="" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="mb-3 mt-3">
              <label for="phone" class="form-label">Phone:</label>
              <input type="text" class="form-control" name="phone" value="" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Gmail:</label>
                <input type="text" class="form-control" name="gmail" value="" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
        
            <div class="col-12">
              <button type="submit" class="btn " id="liveAlertBtn" data-bs-toggle="tooltip" title="Submit right now!" name="dangky">Đăng ký</button>
              <div id="liveAlertPlaceholder"></div>
              <span>Bạn đã có tài khoản? Đăng nhập <a href="login.php" style="color: red;"><u>tại đây</u></a></span>

            </div>
            
          </form>

        </div>
    </div>

    <!-- -->
    <?php include 'footer.php'; ?>

</body>
</html>
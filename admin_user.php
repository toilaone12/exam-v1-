<?php

@include 'config.php';

if(isset($_POST['add_user'])){
   $t_username=$_POST['t_username'];
   $t_password=$_POST['t_password'];
   $t_phone=$_POST['t_phone'];
   $t_gmail=$_POST['t_gmail'];

   $insert_query= mysqli_query($conn,"INSERT INTO tk(username,password,phone,gmail) VALUES('$t_username','$t_password','$t_phone','$t_gmail' )");

   if($insert_query){
      $message[]= 'tk add succesfully';
   }else{
      $message[]= 'could not add tk ';
   }
}



// xoa
if(isset($_GET['delete'])){
   $delete_id=$_GET['delete'];
   $delete_query=mysqli_query($conn, "DELETE FROM `tk` WHERE id=$delete_id") or die ('query failed');
   if($delete_query){
      
      $message[]='product has been deleted';
      header('location:admin_user.php');
   }
   else{
   
      $message[]='product could not be deleted';
   }
}


if(isset($_POST['update_user'])){
   $update_t_id=$_POST['update_t_id'];
   $update_t_username=$_POST['update_t_username'];
   $update_t_password=$_POST['update_t_password'];
   $update_t_phone=$_POST['update_t_phone'];
   $update_t_gmail=$_POST['update_t_gmail'];

   $update_query= mysqli_query($conn, "UPDATE `tk` SET username='$update_t_username',password='$update_t_password',phone='$update_t_phone',gmail='$update_t_gmail' WHERE id= '$update_t_id' ");

   if($update_query){
      $message[]= 'tk updated succesfully';
      header('location:admin_user.php');
   }
   else{
      $message[]='tk could not be updated';
      header('location:admin_user.php');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/admin.css">
</head>
<body>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>' .$message. '</span><i class="fas fa-times" onclick="this.parentElement.style.display=`none`;"></i></div>';
   };
};

?>

<?php include 'header_admin.php'; ?>
 
<div class="container">
    <section>
        <form action="" method="post" class="add-form" enctype="multipart/form-data">
            <h3>add a new user</h3>
            <input type="text" name="t_username" placeholder="enter username" class="box" required>
            <input type="text" name="t_password" min="0" placeholder="enter password" class="box" required>
            <input type="text" name="t_phone" min="0" placeholder="enter phone" class="box" required>
            <input type="text" name="t_gmail" min="0" placeholder="enter gmail" class="box" required>
        <input type="submit" value="add user" name="add_user" class="btn">
        </form>
    </section>
    <div class="search-form">
        <form action="" method="get">
            <input type="text" name="search" placeholder="enter key to search" class="search box" value="<?php if(isset($_GET["search"])) {echo $_GET["search"]; } ?>"> 
            <input type="submit" value="search" name="search_user" class="btn">
        </form>
    </div>
    <section class="display-table mt-3">
        <table>
            <thead>
                <th>username</th>
                <th>password</th>
                <th>phone</th>
                <th>gmail</th>
                <th>action</th>
            </thead>
            <tbody>
                <?php  
                if(isset($_GET["search"]) && !empty($_GET["search"])){
                    $key= $_GET["search"];
                    $select_products = mysqli_query($conn,"SELECT *FROM tk WHERE id LIKE '%$key%' OR username LIKE '%$key%' OR phone LIKE '%$key%' OR gmail LIKE '%$key%' ");
                }else{
                    $select_products = mysqli_query($conn,"SELECT * FROM `tk`");
                }
                // hien thi du lieu tu database
                if(mysqli_num_rows($select_products) > 0){
                    // hien thi tu du lieu ra form
                    while($row = mysqli_fetch_assoc($select_products)){
                    
                ?>

                <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['gmail']; ?></td>

                <td>
                    <a href="admin_user.php?delete=<?php echo $row['id']; ?>" class="delete-btn" 
                    onclick="return confirm('are your sure you want to delete this?');"><i 
                    class="fas fa-trash"></i>delete</a>

                    <a href="admin_user.php?edit=<?php echo $row['id']; ?>" class="option-btn"><i 
                    class="fas fa-edit"></i>update</a>
                </td>
                </tr>

                <?php
                            }
                    }else{
                        echo "<div class='empty'>no user added</div>";
                    }
                ?>
            </tbody>
        </table>
    </section>
    <section class="edit-form-container">

        <?php
        if(isset($_GET['edit'])){
            $edit_id=$_GET['edit'];
            $edit_query= mysqli_query($conn,"SELECT * FROM `tk` WHERE id=$edit_id ");
            if(mysqli_num_rows($edit_query)>0){
            while($fetch_edit= mysqli_fetch_assoc($edit_query)){
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="update_t_id" value="<?php echo $fetch_edit['id'];  ?>">
            <input type="text" class="box" required name="update_t_username" value="<?php echo $fetch_edit['username'];  ?>">
            <input type="text" class="box" required name="update_t_password" value="<?php echo $fetch_edit['password'];  ?>">
            <input type="text" class="box" required name="update_t_phone" value="<?php echo $fetch_edit['phone'];  ?>">
            <input type="text" class="box" required name="update_t_gmail" value="<?php echo $fetch_edit['gmail'];  ?>">

            <input type="submit" value="update info user" name="update_user" class="btn">
            <input type="submit" value="cancel" id="close-edit" class="option-btn">
        </form>

        <?php
                    }
                }
                echo "<script> document.querySelector('.edit-form-container').style.display = 'flex'; </script>";
            }
        ?>
    </section>

</div>



   <script src="./public/js/script.js"></script>
</body>
</html>
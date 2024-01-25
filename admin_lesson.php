<?php

@include 'config.php';

if(isset($_POST['add_lesson'])){
   $l_name=$_POST['l_name'];
   $l_image=$_FILES['l_image']['name'];
   $l_image_tmp_name=$_FILES['l_image']['tmp_name'];
   $l_image_folder='./public/img/'.$l_image;
   $l_sotuvung=$_POST['l_sotuvung'];
   $l_trinhdo=$_POST['l_trinhdo'];

   $insert_query= mysqli_query($conn,"INSERT INTO baihoc(name,image,sotuvung,trinhdo) VALUES('$l_name','$l_image','$l_sotuvung','$l_trinhdo')");


   if($insert_query){
      move_uploaded_file($l_image_tmp_name,$l_image_folder);
      $message[]= 'lesson add succesfully';
   }else{
      $message[]= 'could not add the lesson ';
   }
}



// xoa
if(isset($_GET['delete'])){
   $delete_id=$_GET['delete'];
   $delete_query=mysqli_query($conn, "DELETE FROM `baihoc` WHERE id=$delete_id") or die ('query failed');
   if($delete_query){
      
      $message[]='this lesson has been deleted';
      header('location:admin_lesson.php');
   }
   else{
   
      $message[]='this lesson could not be deleted';
   }
}


if(isset($_POST['update_lesson'])){
   $update_l_id=$_POST['update_l_id'];
   $update_l_name=$_POST['update_l_name'];
   $update_l_image=$_FILES['update_l_image']['name'];
   $update_l_image_tmp_name=$_FILES['update_l_image']['tmp_name'];
   $update_l_image_folder='./public/img/'.$update_l_image;
   $update_l_sotuvung=$_POST['update_l_sotuvung'];
   $update_l_trinhdo=$_POST['update_l_trinhdo'];

   $update_query= mysqli_query($conn, "UPDATE `baihoc` SET name='$update_l_name',image='$update_l_image',sotuvung='$update_l_sotuvung', trinhdo='$update_l_trinhdo' WHERE id= '$update_l_id' ");

   if($update_query){
      move_uploaded_file($update_l_image_tmp_name,$update_l_image_folder);
      $message[]= 'lesson updated succesfully';
      header('location:admin_lesson.php');
   }
   else{
      $message[]='lesson could not be updated';
      header('location:admin_lesson.php');
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
            <h3>add a new product</h3>
            <input type="file" name="l_image" accept="image/png,image/jpg,image/jpeg" class="box" required>
            <input type="text" name="l_name" placeholder="enter lesson name" class="box" required>
            <input type="text" name="l_sotuvung" min="0" placeholder="enter so tu vung" class="box" required>
            <input type="text" name="l_trinhdo" min="0" placeholder="enter trình độ" class="box" required>
        <input type="submit" value="add lesson" name="add_lesson" class="btn">
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
                <th>image</th>
                <th>name</th>
                <th>số từ vựng</th>
                <th>trình độ</th>
                <th>action</th>
            </thead>
            <tbody>
                <?php  
               if(isset($_GET["search"]) && !empty($_GET["search"])){
                $key= $_GET["search"];
                $select_products = mysqli_query($conn,"SELECT *FROM baihoc WHERE id LIKE '%$key%' OR name LIKE '%$key%' OR sotuvung LIKE '%$key%' OR trinhdo LIKE '%$key%' ");
            }else{
                $select_products = mysqli_query($conn,"SELECT * FROM `baihoc`");
            }
            // hien thi du lieu tu database
            if(mysqli_num_rows($select_products) > 0){
                // hien thi tu du lieu ra form
                while($row = mysqli_fetch_assoc($select_products)){
                
                ?>

                <tr>
                <td><img src="./public/img/<?php echo $row['image']; ?>" height="100" ></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['sotuvung']; ?></td>
                <td><?php echo $row['trinhdo']; ?></td>
                <td>
                    <a href="admin_lesson.php?delete=<?php echo $row['id']; ?>" class="delete-btn" 
                    onclick="return confirm('are your sure you want to delete this?');"><i 
                    class="fas fa-trash"></i>delete</a>

                    <a href="admin_lesson.php?edit=<?php echo $row['id']; ?>" class="option-btn"><i 
                    class="fas fa-edit"></i>update</a>
                </td>
                </tr>

                <?php
                            }
                    }else{
                        echo "<div class='empty'>no lesson added</div>";
                    }
                ?>
            </tbody>
        </table>
    </section>
    <section class="edit-form-container">

        <?php
         if(isset($_GET['edit'])){
            $edit_id=$_GET['edit'];
            $edit_query= mysqli_query($conn,"SELECT * FROM `baihoc` WHERE id=$edit_id ");
            if(mysqli_num_rows($edit_query)>0){
            while($fetch_edit= mysqli_fetch_assoc($edit_query)){

        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <img src="./public/img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
            <input type="hidden" name="update_l_id" value="<?php echo $fetch_edit['id'];  ?>">
            <input type="text" class="box" required name="update_l_name" value="<?php echo $fetch_edit['name'];  ?>">
            <input type="file" min="0" class="box" required name="update_l_image" accept="image/png, image/jpg, image/jpeg">
            <input type="text" class="box" required name="update_l_sotuvung" value="<?php echo $fetch_edit['sotuvung'];  ?>">
            <input type="text" class="box" required name="update_l_trinhdo" value="<?php echo $fetch_edit['trinhdo'];  ?>">

            <input type="submit" value="update lesson" name="update_lesson" class="btn">
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
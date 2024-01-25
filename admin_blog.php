<?php

@include 'config.php';

if(isset($_POST['add_blog'])){
   $b_name=$_POST['b_name'];
   $b_image=$_FILES['b_image']['name'];
   $b_image_tmp_name=$_FILES['b_image']['tmp_name'];
   $b_image_folder='./public/img/'.$b_image;
   $b_img_title=$_POST['b_img_title'];
   $b_content=$_POST['b_content'];
   $b_author=$_POST['b_author'];
   $b_type=$_POST['b_type'];

   $insert_query= mysqli_query($conn,"INSERT INTO blog(name,img,img_title,content,author,type) VALUES('$b_name','$b_image','$b_img_title','$b_content','$b_author','$b_type')");


   if($insert_query){
      move_uploaded_file($b_image_tmp_name,$b_image_folder);
      $message[]= 'this blog add succesfully';
   }else{
      $message[]= 'could not add this blog ';
   }
}



// xoa
if(isset($_GET['delete'])){
   $delete_id=$_GET['delete'];
   $delete_query=mysqli_query($conn, "DELETE FROM `blog` WHERE id=$delete_id") or die ('query failed');
   if($delete_query){
      
      $message[]='this blog has been deleted';
      header('location:admin_blog.php');
   }
   else{
   
      $message[]='this blog could not be deleted';
   }
}


if(isset($_POST['update_blog'])){
   $update_b_id=$_POST['update_b_id'];
   $update_b_name=$_POST['update_b_name'];
   $update_b_image=$_FILES['update_b_image']['name'];
   $update_b_image_tmp_name=$_FILES['update_b_image']['tmp_name'];
   $update_b_image_folder='./public/img/'.$update_b_image;
   $update_b_img_title=$_POST['update_b_img_title'];
   $update_b_content=$_POST['update_b_content'];
   $update_b_author=$_POST['update_b_author'];
   $update_b_type=$_POST['update_b_type'];

   $update_query= mysqli_query($conn, "UPDATE `blog` SET name='$update_b_name',img='$update_b_image',img_title='$update_b_img_title', content='$update_b_content', author='$update_b_author', type='$update_b_type' WHERE id= '$update_b_id' ");

   if($update_query){
      move_uploaded_file($update_b_image_tmp_name,$update_b_image_folder);
      $message[]= 'blog updated succesfully';
      header('location:admin_blog.php');
   }
   else{
      $message[]='blog could not be updated';
      header('location:admin_blog.php');
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
            <h3>add a new blog</h3>
            <input type="text" name="b_name" placeholder="enter name of blog" class="box" required>
            <input type="file" name="b_image" accept="image/png,image/jpg,image/jpeg" class="box" required>
            <input type="text" name="b_img_title" placeholder="enter title of img" class="box" required>
            <input type="text" name="b_content" min="0" placeholder="enter content" class="box" required>
            <input type="text" name="b_author" min="0" placeholder="enter author" class="box" required>
            <input type="text" name="b_type" min="0" placeholder="enter type" class="box" required>
        <input type="submit" value="add blog" name="add_blog" class="btn">
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
                <th>img title</th>
                <th>content</th>
                <th>author</th>
                <th>type</th>
                <th>action</th>

            </thead>
            <tbody>
                <?php  
                if(isset($_GET["search"]) && !empty($_GET["search"])){
                    $key= $_GET["search"];
                    $select_products = mysqli_query($conn,"SELECT *FROM blog WHERE id LIKE '%$key%' OR name LIKE '%$key%' OR img_title LIKE '%$key%' OR content LIKE '%$key%' OR author LIKE '%$key%' OR type LIKE '%$key%' ");
                }else{
                    $select_products = mysqli_query($conn,"SELECT * FROM `blog`");
                }
                // hien thi du lieu tu database
                if(mysqli_num_rows($select_products) > 0){
                    // hien thi tu du lieu ra form
                    while($row = mysqli_fetch_assoc($select_products)){
                    
                ?>

                <tr>
                <td><img src="./public/img/<?php echo $row['img']; ?>" height="100" ></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['img_title']; ?></td>
                <td><?php echo $row['content']; ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td>
                    <a href="admin_blog.php?delete=<?php echo $row['id']; ?>" class="delete-btn" 
                    onclick="return confirm('are your sure you want to delete this?');"><i 
                    class="fas fa-trash"></i>delete</a>

                    <a href="admin_blog.php?edit=<?php echo $row['id']; ?>" class="option-btn"><i 
                    class="fas fa-edit"></i>update</a>
                </td>
                </tr>

                <?php
                            }
                    }else{
                        echo "<div class='empty'>no blog added</div>";
                    }
                ?>
            </tbody>
        </table>
    </section>
    <section class="edit-form-container">

        <?php
        if(isset($_GET['edit'])){
            $edit_id=$_GET['edit'];
            $edit_query= mysqli_query($conn,"SELECT * FROM `blog` WHERE id=$edit_id ");
            if(mysqli_num_rows($edit_query)>0){
            while($fetch_edit= mysqli_fetch_assoc($edit_query)){
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <img src="./public/img/<?php echo $fetch_edit['img']; ?>" height="200" alt="">
            <input type="hidden" name="update_b_id" value="<?php echo $fetch_edit['id'];  ?>">
            <input type="text" class="box" required name="update_b_name" value="<?php echo $fetch_edit['name'];  ?>">
            <input type="file" min="0" class="box" required name="update_b_image" accept="image/png, image/jpg, image/jpeg">
            <input type="text" class="box" required name="update_b_img_title" value="<?php echo $fetch_edit['img_title'];  ?>">
            <input type="text" class="box" required name="update_b_content" value="<?php echo $fetch_edit['content'];  ?>">
            <input type="text" class="box" required name="update_b_author" value="<?php echo $fetch_edit['author'];  ?>">
            <input type="text" class="box" required name="update_b_type" value="<?php echo $fetch_edit['type'];  ?>">

            <input type="submit" value="update blog" name="update_blog" class="btn">
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
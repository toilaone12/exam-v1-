<?php

@include 'config.php';

if(isset($_POST['add_product'])){
   $p_name=$_POST['p_name'];
   $p_image=$_FILES['p_image']['name'];
   $p_image_tmp_name=$_FILES['p_image']['tmp_name'];
   $p_image_folder='./public/img/'.$p_image;
   $p_nd=$_POST['p_nd'];
   $p_ndct_title=$_POST['p_ndct_title'];
   $p_ndct_text=$_POST['p_ndct_text'];
   $p_trinhdo=$_POST['p_trinhdo'];
   $p_khaigiang=$_POST['p_khaigiang'];
   $p_thoigian=$_POST['p_thoigian'];
   $p_sotiethoc=$_POST['p_sotiethoc'];
   $p_hocvien=$_POST['p_hocvien'];
   $p_price=$_POST['p_price'];
   $p_title1=$_POST['p_title1'];
   $p_title2=$_POST['p_title2'];
   $p_title3=$_POST['p_title3'];

   $insert_query= mysqli_query($conn,"INSERT INTO products(name,image,nd,ndct_title,ndct_text,trinhdo,khaigiang,thoigian,sotiethoc,hocvien,price,title1,title2,title3) VALUES('$p_name','$p_image','$p_nd','$p_ndct_title','$p_ndct_text','$p_trinhdo','$p_khaigiang','$p_thoigian','$p_sotiethoc','$p_hocvien','$p_price','$p_title1','$p_title2','$p_title3')");


   if($insert_query){
      move_uploaded_file($p_image_tmp_name,$p_image_folder);
      $message[]= 'product add succesfully';
   }else{
      $message[]= 'could not add the product ';
   }
}



// xoa
if(isset($_GET['delete'])){
   $delete_id=$_GET['delete'];
   $delete_query=mysqli_query($conn, "DELETE FROM `products` WHERE id=$delete_id") or die ('query failed');
   if($delete_query){
      
      $message[]='product has been deleted';
      header('location:admin_course.php');
   }
   else{
   
      $message[]='product could not be deleted';
   }
}


if(isset($_POST['update_product'])){
   $update_p_id=$_POST['update_p_id'];
   $update_p_name=$_POST['update_p_name'];
   $update_p_image=$_FILES['update_p_image']['name'];
   $update_p_image_tmp_name=$_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder='./public/img/'.$update_p_image;
   $update_p_nd=$_POST['update_p_nd'];
   $update_p_ndct_title=$_POST['update_p_ndct_title'];
   $update_p_ndct_text=$_POST['update_p_ndct_text'];
   $update_p_trinhdo=$_POST['update_p_trinhdo'];
   $update_p_khaigiang=$_POST['update_p_khaigiang'];
   $update_p_thoigian=$_POST['update_p_thoigian'];
   $update_p_sotiethoc=$_POST['update_p_sotiethoc'];
   $update_p_hocvien=$_POST['update_p_hocvien'];
   $update_p_price=$_POST['update_p_price'];
   $update_p_title1=$_POST['update_p_title1'];
   $update_p_title2=$_POST['update_p_title2'];
   $update_p_title3=$_POST['update_p_title3'];

   $update_query= mysqli_query($conn, "UPDATE `products` SET name='$update_p_name',image='$update_p_image',nd='$update_p_nd',ndct_title='$update_p_ndct_title',ndct_text='$update_p_ndct_text', trinhdo='$update_p_trinhdo', khaigiang='$update_p_khaigiang', thoigian='$update_p_thoigian', sotiethoc='$update_p_sotiethoc', hocvien='$update_p_hocvien',price='$update_p_price',title1='$update_p_title1',title2='$update_p_title2',title3='$update_p_title3' WHERE id= '$update_p_id' ");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name,$update_p_image_folder);
      $message[]= 'product updated succesfully';
      header('location:admin_course.php');
   }
   else{
      $message[]='product could not be updated';
      header('location:admin_course.php');
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
            <input type="text" name="p_name" placeholder="enter the product name" class="box" required>
            <input type="file" name="p_image" accept="image/png,image/jpg,image/jpeg" class="box" required>
            <input type="text" name="p_nd" min="0" placeholder="enter nội dung" class="box" required>
            <input type="text" name="p_ndct_title" min="0" placeholder="enter nội dung chi tiết title" class="box" required>
            <input type="text" name="p_ndct_text" min="0" placeholder="enter nội dung chi tiết text" class="box" required>
            <input type="text" name="p_trinhdo" min="0" placeholder="enter trình độ" class="box" required>
            <input type="text" name="p_khaigiang" min="0" placeholder="enter khai giảng" class="box" required>
            <input type="text" name="p_thoigian" min="0" placeholder="enter thoigian" class="box" required>
            <input type="text" name="p_sotiethoc" min="0" placeholder="enter số tiết học" class="box" required>
            <input type="text" name="p_hocvien" min="0" placeholder="enter số học viên" class="box" required>
            <input type="text" name="p_price" min="0" placeholder="enter the product price" class="box" required>
            <input type="text" name="p_title1" min="0" placeholder="enter title1" class="box" required>
            <input type="text" name="p_title2" min="0" placeholder="enter title2" class="box" required>
            <input type="text" name="p_title3" min="0" placeholder="enter title3" class="box" required>
        <input type="submit" value="add the product" name="add_product" class="btn">
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
                <th>name</th>
                <th>image</th>
                <th>nội dung</th>
                <th>nd chi tiết title</th>
                <th>nd chi tiết text</th>
                <th>trình độ</th>
                <th>khai giảng</th>
                <th>thời gian</th>
                <th>số tiết học</th>
                <th>học viên</th>
                <th>price</th>
                <th>title1</th>
                <th>title2</th>
                <th>title3</th>
                <th>action</th>
            </thead>
            <tbody>
                <?php  
                if(isset($_GET["search"]) && !empty($_GET["search"])){
                    $key= $_GET["search"];
                    $select_products = mysqli_query($conn,"SELECT *FROM products WHERE id LIKE '%$key%' OR name LIKE '%$key%' OR nd LIKE '%$key%' OR ndct_title LIKE '%$key%' OR ndct_text LIKE '%$key%' OR trinhdo LIKE '%$key%' OR khaigiang LIKE '%$key%' OR thoigian LIKE '%$key%' OR sotiethoc LIKE '%$key%' OR price LIKE '%$key%' OR title1 LIKE '%$key%' OR title2 LIKE '%$key%' OR title3 LIKE '%$key%' ");
                }else{
                    $select_products = mysqli_query($conn,"SELECT * FROM `products`");
                }
                // hien thi du lieu tu database
                if(mysqli_num_rows($select_products) > 0){
                    // hien thi tu du lieu ra form
                    while($row = mysqli_fetch_assoc($select_products)){
                    
                ?>

                <tr>
                <td><?php echo $row['name']; ?></td>
                <td><img src="./public/img/<?php echo $row['image']; ?>" height="100" ></td>
                <td><?php echo $row['nd']; ?></td>
                <td><?php echo $row['ndct_title']; ?></td>
                <td><?php echo $row['ndct_text']; ?></td>
                <td><?php echo $row['trinhdo']; ?></td>
                <td><?php echo $row['khaigiang']; ?></td>
                <td><?php echo $row['thoigian']; ?></td>
                <td><?php echo $row['sotiethoc']; ?></td>
                <td><?php echo $row['hocvien']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['title1']; ?></td>
                <td><?php echo $row['title2']; ?></td>
                <td><?php echo $row['title3']; ?></td>

                <td>
                    <a href="admin_course.php?delete=<?php echo $row['id']; ?>" class="delete-btn" 
                    onclick="return confirm('are your sure you want to delete this?');"><i 
                    class="fas fa-trash"></i>delete</a>

                    <a href="admin_course.php?edit=<?php echo $row['id']; ?>" class="option-btn"><i 
                    class="fas fa-edit"></i>update</a>
                </td>
                </tr>

                <?php
                            }
                    }else{
                        echo "<div class='empty'>no product added</div>";
                    }
                ?>
            </tbody>
        </table>
    </section>
    <section class="edit-form-container">

        <?php
        if(isset($_GET['edit'])){
            $edit_id=$_GET['edit'];
            $edit_query= mysqli_query($conn,"SELECT * FROM `products` WHERE id=$edit_id ");
            if(mysqli_num_rows($edit_query)>0){
            while($fetch_edit= mysqli_fetch_assoc($edit_query)){
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <img src="./public/img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
            <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id'];  ?>">
            <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name'];  ?>">
            <input type="file" min="0" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
            <input type="text" class="box" required name="update_p_nd" value="<?php echo $fetch_edit['nd'];  ?>">
            <input type="text" class="box" required name="update_p_ndct_title" value="<?php echo $fetch_edit['ndct_title'];  ?>">
            <input type="text" class="box" required name="update_p_ndct_text" value="<?php echo $fetch_edit['ndct_text'];  ?>">
            <input type="text" class="box" required name="update_p_trinhdo" value="<?php echo $fetch_edit['trinhdo'];  ?>">
            <input type="text" class="box" required name="update_p_khaigiang" value="<?php echo $fetch_edit['khaigiang'];  ?>">
            <input type="text" class="box" required name="update_p_thoigian" value="<?php echo $fetch_edit['thoigian'];  ?>">
            <input type="text" class="box" required name="update_p_sotiethoc" value="<?php echo $fetch_edit['sotiethoc'];  ?>">
            <input type="text" class="box" required name="update_p_hocvien" value="<?php echo $fetch_edit['hocvien'];  ?>">
            <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price'];  ?>">
            <input type="text" class="box" required name="update_p_title1" value="<?php echo $fetch_edit['title1'];  ?>">
            <input type="text" class="box" required name="update_p_title2" value="<?php echo $fetch_edit['title2'];  ?>">
            <input type="text" class="box" required name="update_p_title3" value="<?php echo $fetch_edit['title3'];  ?>">

            <input type="submit" value="update the product" name="update_product" class="btn">
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
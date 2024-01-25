<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){
   $product_name= $_POST['product_name'];
   $product_price= $_POST['product_price'];
   $product_image= $_POST['product_image'];
   $product_quantity= 1;


   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[]= 'product already added to cart';
   }else{
      $insert_product= mysqli_query($conn,"INSERT INTO `cart`(name,price,image,quantity) VALUES('$product_name','$product_price','$product_image','$product_quantity')");
      $message[]= 'product added to cart succesfully';
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
    <style>
        .search-form-container {
position: fixed;
top: 0;
left: 0;
z-index: 1100;
background-color: var(--dark-bg);
padding: 2rem;
display: none;
align-items: center;
justify-content: center;
min-height: 100vh;
width: 100%;
}

.search-form-container form {
width: 34rem;
border-radius: .5rem;
background-color: var(--white);
text-align: center;
padding: 1rem 2rem;
max-height: 99%;
overflow-y: auto;
height: 649px;

}


    </style>
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


    <!-- -->
    <div class="bg_header">
        <div class="bg_banner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="title-banner">
                            <h2>HỆ THỐNG ĐÀO TẠO TIẾNG ĐỨC TRỰC TUYẾN</h2> 
                            <p>Website học tiếng Đức trực tuyến Echhocbai.com được tích hợp đầy đủ mọi thông tin, kiến thức và những kỹ năng để giúp các bạn chinh phục tiếng Đức một cách hoàn hảo</p> 
                            <h3><a href="javascript:;" id="open-popup-level-js">Học thử</a></h3>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <img src="./public/img/ban1.png" alt style="height: 80%; padding-left: 120px;">    
                    </div>
                </div>
            </div>
        </div>
        <div class="bg_bot">  
            <img src="./public/img/bg-bot.png" alt>    
        </div>
    </div>

    <section class="course">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="block-thumbnail">
                        <h2 class="block-thumbnail--title-h2">50K<i class="fas fa-plus"></i></h2> 
                        <h3 class="block-thumbnail--title-h3">Từ vựng</h3> 
                        <p>Từ các bài kiểm tra tiếng Đức kiến thức căn bản đến các bài thi.</p>
                    </div>
                </div> 
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="block-thumbnail">
                        <h2 class="block-thumbnail--title-h2">2500<i class="fas fa-plus"></i></h2> 
                        <h3 class="block-thumbnail--title-h3">Ngữ pháp</h3> 
                        <p>Từ các bài kiểm tra tiếng Đức kiến thức căn bản đến các bài thi.</p>
                    </div>
                </div> 
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="block-thumbnail">
                        <h2 class="block-thumbnail--title-h2">300<i class="fas fa-plus"></i></h2> 
                        <h3 class="block-thumbnail--title-h3">Đề thi</h3> 
                        <p>Từ các bài kiểm tra tiếng Đức kiến thức căn bản đến các bài thi.</p>
                    </div>
                </div> 
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="block-thumbnail">
                        <h2 class="block-thumbnail--title-h2">100<i class="fas fa-plus"></i></h2> 
                        <h3 class="block-thumbnail--title-h3">Từ vựng</h3> 
                        <p>Từ các bài kiểm tra tiếng Đức kiến thức căn bản đến các bài thi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="advantages">
        <div class="bg-advantages">
            <div class="advantages--title">
                <h2><a>ƯU ĐIỂM KHI HỌC TẠI ECH e-learning</a></h2>
            </div> 
            <div class="advantages--table">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-mb-scroll">
                                <div class="table-w">
                                    <table class="table table--border table--color--radius">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th> 
                                                <th scope="col">Học tại trung tâm</th>
                                                <th scope="col">Học với gia sư</th>
                                                <th scope="col">Học trực tuyến</th>
                                                <th scope="col">Ứng dụng khác</th> 
                                                <th scope="col">Echhocbai.com</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            <tr>
                                                <th>Chương trình thiết kế riêng</th>
                                                 <td data-title="Học tại trung tâm"><i class="fas fa-check-circle"></i></td>
                                                 <td data-title="Học với gia sư"><span class="line-table"></span></td>
                                                 <td data-title="Học trực tuyến"><i class="fas fa-check-circle"></i></td>
                                                 <td data-title="Ứng dụng khác"><span class="line-table"></span></td>
                                                 <td data-title="Decamy.com"><i class="fas fa-check-circle"></i></td>
                                            </tr>
                                            <tr>
                                                <th>Lịch học linh hoạt</th>
                                                 <td data-title="Học tại trung tâm"><i class="fas fa-check-circle"></i></td>
                                                 <td data-title="Học với gia sư"><span class="line-table"></span></td>
                                                 <td data-title="Học trực tuyến"><span class="line-table"></span></td>
                                                 <td data-title="Ứng dụng khác"><span class="line-table"></span></td> 
                                                 <td data-title="Decamy.com"><i class="fas fa-check-circle"></i></td>
                                            </tr>
                                            <tr>
                                                <th>Kiểm soát tiến trình học</th> 
                                                <td data-title="Học tại trung tâm"><i class="fas fa-check-circle"></i></td>
                                                <td data-title="Học với gia sư"><i class="fas fa-check-circle"></i></td>
                                                <td data-title="Học trực tuyến"><span class="line-table"></span></td>
                                                <td data-title="Ứng dụng khác"><i class="fas fa-check-circle"></i></td> 
                                                <td data-title="Decamy.com"><i class="fas fa-check-circle"></i></td>
                                            </tr>
                                            <tr>
                                                <th>Phương pháp học đa dạng</th> 
                                                <td data-title="Học tại trung tâm"><i class="fas fa-check-circle"></i></td>
                                                <td data-title="Học với gia sư"><i class="fas fa-check-circle"></i></td>
                                                <td data-title="Học trực tuyến"><i class="fas fa-check-circle"></i></td>
                                                <td data-title="Ứng dụng khác"><i class="fas fa-check-circle"></i></td>
                                                 <td data-title="Decamy.com"><i class="fas fa-check-circle"></i></td>
                                            </tr>
                                            <tr>
                                                <th>Học trực tiếp</th> 
                                                <td data-title="Học tại trung tâm"><span class="line-table"></span></td>
                                                <td data-title="Học với gia sư"><span class="line-table"></span></td>
                                                <td data-title="Học trực tuyến"><span class="line-table"></span></td>
                                                <td data-title="Ứng dụng khác"><span class="line-table"></span></td> 
                                                <td data-title="Decamy.com"><i class="fas fa-check-circle"></i></td>
                                            </tr>
                                            <tr>
                                                <th>Luyện thi theo trình độ</th> 
                                                <td data-title="Học tại trung tâm"><span class="line-table"></span></td>
                                                <td data-title="Học với gia sư"><span class="line-table"></span></td>
                                                <td data-title="Học trực tuyến"><span class="line-table"></span></td>
                                                <td data-title="Ứng dụng khác"><span class="line-table"></span></td> 
                                                <td data-title="Decamy.com"><i class="fas fa-check-circle"></i></td>
                                            </tr>
                                            <tr>
                                                <th>Chi phí học thấp</th> 
                                                <td data-title="Học tại trung tâm"><i class="fas fa-check-circle"></i>
                                                </td><td data-title="Học với gia sư"><span class="line-table"></span></td>
                                                <td data-title="Học trực tuyến"><i class="fas fa-check-circle"></i></td>
                                                <td data-title="Ứng dụng khác"><span class="line-table"></span></td> 
                                                <td data-title="Decamy.com"><i class="fas fa-check-circle"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>
    <br>

    <section class="video">
        <div class="bg-video">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7">
                        <div class="video-intro">
                            <div class="img-intro fix-img">
                                <img src="./public/img/bg-video.png" alt="">
                            </div> 
                            <a class="icon-open-video">
                                <span></span>
                            </a></div> 
                            <!---->
                    </div> 
                    <div class="col-md-12 col-lg-5 flex-title">
                        <div class="title-video">
                            <h2>Ech E-learning hoạt động như thế nào?</h2> 
                            <p>Lộ trình xây dựng phù hợp với tất cả nhu cầu học và lứa tuổi. Bạn có thể bắt đầu học chỉ với 4 bước nhanh chóng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="br"></div>

    <!-- Displaying Products Start -->
    <div class="container" id="pro">
        <div class="row mt-2 pb-3">
            <?php
                
                $select_products = mysqli_query($conn,"SELECT * FROM `products`");
                if(mysqli_num_rows($select_products) > 0){
                    while($fetch_product = mysqli_fetch_assoc($select_products )){
                
            ?>
                <div class="col-sm-6 col-md-4 col-lg-4 mb-2">
            <form action="" method="post">
                    <div class="card-deck">
                        <div class="card p-2 border-secondary mb-2">
                            <img src="./public/img/<?php echo $fetch_product['image']; ?>" class="card-img-top" height="250">
                            <div class="card-body p-1">
                                <h4 class="card-title text-center" style="color:#e28800;"><?php echo $fetch_product['name']; ?></h4>
                                <div class="">
                                    <ul>
                                        <li class="bullet-list-item"><?php echo $fetch_product['title1']; ?></li>
                                        <li class="bullet-list-item"><?php echo $fetch_product['title2']; ?></li>
                                        <li class="bullet-list-item"><?php echo $fetch_product['title3']; ?></li>
                                    </ul>
                                </div>
                                <h5 class="card-text text-center text-danger"><span><?php echo $fetch_product['price']; ?></span> VND</h5>
                            </div>
                            <div class="card-footer p-1 mt-3">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                <input type="submit" value="add to cart" class="btn" name="add_to_cart">
                            </div>
                        </div>
                    </div>
            
            </form>
            </div>
        
            <?php 
            }
            }
        ?>
            




        </div>
    </div>
    <!-- Displaying Products End -->

        

    <section class="testimonials">
        <div class="containerr">
            <div class="section-header">
                <h2 class="title">CẢM NHẬN KHÁCH HÀNG</h2>
            </div>
            <div class="testimonials-content">
                <div class="swiper testimonials-slider js-testimonials-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide testimonials-item">
                            <div class="info">
                                <img src="./public/img/review-1.png" alt="img">
                                <div class="text-box">
                                    <h3 class="name">Trần Hữu Trung</h3>
                                    <span class="job">Khi mới sang em cũng không tránh khỏi những bỡ ngỡ, nhưng với sự giúp đỡ của các thầy cô tại Đức, và các anh chị đang sống trong khu nhà, sau 1 tuần em đã có thể hòa nhập với cuộc sống tại đất nước hiện đại và phát triển này.</span>
                                </div>
                            </div>
                            <p></p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>

                    <!---->
            
                        <div class="swiper-slide testimonials-item">
                            <div class="info">
                                <img src="./public/img/review-3.png" alt="img">
                                <div class="text-box">
                                    <h3 class="name">TS.Lê Hoài Ân</h3>
                                    <span class="job">Với tư cách là những chuyên gia trong lĩnh vực nghiên cứu và giảng dạy tiếng Đức, tôi thấy rằng Echhocbai đang có những hướng đi rất hợp lý trong lĩnh vực đào tạo tiếng Đức, đó là tập trung đầu tư vào con người, đầu tư cho việc nâng cao năng lực đội ngũ giáo viên.</span>
                                </div>
                            </div>
                            <p></p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    

                        <!---->
                    
                        <div class="swiper-slide testimonials-item">
                            <div class="info">
                                <img src="./public/img/review-4.png" alt="img">
                                <div class="text-box">
                                    <h3 class="name">Nguyễn Khánh Linh</h3>
                                    <span class="job">Cảm nhận của em ngay trong những ngày đầu đặt chân đến đây đó là nước Đức rất hiện đại và phát triển. Để hòa nhập tốt và nhanh chóng ở đây thì quan trọng nhất là tiếng Đức và học hỏi chúng 1 cách nhất nhất có thể.</span>
                                </div>
                            </div>
                            <p></p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        
                        </div>

                        <!---->

                        <div class="swiper-slide testimonials-item">
                            <div class="info">
                                <img src="./public/img/review-5.png" alt="img">
                                <div class="text-box">
                                    <h3 class="name">Trần Xuân Khôi</h3>
                                    <span class="job">Học 1 ngôn ngữ mới là 1 chuyện rất khó đối với nhiều người nhưng cũng nhờ đó mà chúng ta đã tự tạo ra cho bản thân mình nhiều cơ hội hơn so với mọi người cũng như trong cả hiện tại và tương lai sau này. Cố lên !</span>
                                </div>
                            </div>
                            <p></p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        
                        </div>
                
                    </div>
                </div>
                <div class="swiper-pagination js-testimonials-pagination"></div>
            </div>           
        </div>
    </section>
    <!--END REVIEW-->


    <!--BLOG-->
    <section class="blog" id="blog">
        <div class="section-header">
            <h2 class="title">Tin tức</h2>
        </div>
        <div class="post container">
            <?php  
                // hien thi du lieu tu database
                $select_products = mysqli_query($conn,"SELECT * FROM `blog`");
                if(mysqli_num_rows($select_products) > 0){
                    // hien thi tu du lieu ra form
                    while($row = mysqli_fetch_assoc($select_products)){
                    
                ?>
            <!-- Post 1 -->
            <div class="post-box tech">
                <img src="./public/img/<?php echo $row['img']; ?>" alt="" class="post-img">
                <h2 class="category"><?php echo $row['type']; ?></h2>
                <a href="blog1.php" class="post-title" ><?php echo $row['img_title']; ?></a>
                <span class="post-date">Jan 2024</span>
                <p class="post-description"><?php echo $row['content']; ?></p>
                <div class="profile">
                    <img src="./public/img/user-icon.png" alt="" class="profile-img">
                    <span class="profile-name"><?php echo $row['author']; ?></span>
                </div>
            </div>
            <?php 
                }
                }
            ?>

            
        </div>
    </section>

    <!--search-->
<section class="search-form-container">
    <div class="row mt-2 pb-3">

    <?php
    if(isset($_GET["search"]) && !empty($_GET["search"])){
        $key= $_GET["search"];
        $select_products = mysqli_query($conn,"SELECT *FROM products WHERE id LIKE '%$key%' OR name LIKE '%$key%' OR nd LIKE '%$key%' OR ndct_title LIKE '%$key%' OR ndct_text LIKE '%$key%' OR trinhdo LIKE '%$key%' OR khaigiang LIKE '%$key%' OR thoigian LIKE '%$key%' OR sotiethoc LIKE '%$key%' OR price LIKE '%$key%' OR title1 LIKE '%$key%' OR title2 LIKE '%$key%' OR title3 LIKE '%$key%' ");
    
    // hien thi du lieu tu database
    if(mysqli_num_rows($select_products) > 0){
        // hien thi tu du lieu ra form
        while($row = mysqli_fetch_assoc($select_products)){
    ?>
            
            <div class="col-sm-12 col-md-6 col-lg-6 mb-2">
            <form action="" method="post">
                    <div class="card-deck">
                        <div class="card p-2 border-secondary mb-2">
                            <img src="./public/img/<?php echo $row['image']; ?>" class="card-img-top" height="250">
                            <div class="card-body p-1">
                                <h4 class="card-title text-center" style="color:#e28800;"><?php echo $row['name']; ?></h4>
                                <div class="">
                                    <ul>
                                        <li class="bullet-list-item"><?php echo $row['title1']; ?></li>
                                        <li class="bullet-list-item"><?php echo $row['title2']; ?></li>
                                        <li class="bullet-list-item"><?php echo $row['title3']; ?></li>
                                    </ul>
                                </div>
                                <h5 class="card-text text-center text-danger"><span><?php echo $row['price']; ?></span> VND</h5>
                            </div>
                            <div class="card-footer p-1 mt-3">
                                <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
                                <input type="submit" value="add to cart" class="btn" name="add_to_cart">
                            </div>
                        </div>
                    </div>
            
            </form>
            </div>
            

        
    <?php
                }
            }
            echo "<script> document.querySelector('.search-form-container').style.display = 'flex'; </script>";
        }
    ?>
    </div>
    <div>
    <input type="submit" value="X" id="close-search" class="option-btn">
    </div>

</section>

    <script type="text/javascript">
    $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var pmakhoahoc = $form.find(".pmakhoahoc").val();
        var ptenkhoahoc = $form.find(".ptenkhoahoc").val();
        var pgia = $form.find(".pgia").val();
        var ppic = $form.find(".ppic").val();

        $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
            pmakhoahoc: pmakhoahoc,
            ptenkhoahoc: ptenkhoahoc,
            pgia: pgia,
            ppic: ppic,
        },
        success: function(response) {
            $("#message").html(response);
            window.scrollTo(0, 0);
            load_cart_item_number();
        }
        });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
        $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
            cartItem: "cart_item"
        },
        success: function(response) {
            $("#cart-item").html(response);
        }
        });
    }
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.js-testimonials-slider', {
            grapCursor: true,
            spaceBetween: 30,
            pagination:{
                el: '.js-testimonials-pagination',
                clickable: true
            },
        breakpoints:{
            767:{
                slidesPerView: 2
            }
        }
        });
    </script>

    <script>
document.querySelector('#close-search').onclick = () =>{
document.querySelector('.search-form-container').style.display = 'none';
window.location.href = 'index.php';
};
    </script>
<?php include 'footer.php'; ?>

    
</body>
</html>
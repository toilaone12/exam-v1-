<?php

@include "config.php";

if(isset($_POST['order_btn'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $gmail = $_POST['gmail'];
    $method = $_POST['method'];
    $diachi = $_POST['diachi'];

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    $price_total=0;
    if(mysqli_num_rows($cart_query) > 0){
        while($product_item = mysqli_fetch_assoc($cart_query)){
            $product_name[]= $product_item['name'] . ' ('. $product_item['quantity'] .' )';
            $product_price= $product_item['price'] * $product_item['quantity'];
            $price_total += $product_price;
        }
    }

    $total_product = implode(', ',$product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, gmail, method, diachi, total_products, total_price) VALUES('$name', '$number', '$gmail', '$method', '$diachi', '$total_product', '$price_total')") or die('query failed');


    if($cart_query && $detail_query){
        echo "
    <div class='order-message-container'>
    <div class='message-container'>
        <h3>thank you for shopping!</h3>
        <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : ".$price_total."</span>
        </div>

        <div class='customer-details'>
            <p>your name: <span>".$name."</span></p>
            <p>your number: <span>".$number."</span></p>
            <p>your email: <span>".$gmail."</span></p>
            <p>your payment mode: <span></span></p>
            <p>(*pay when product arrives*)</p>
        </div>
             <a href='index.php' class='back_btn btn'>continue shopping</a>
        </div>
    </div>
        ";
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
    

<?php include 'header.php'; ?>


<div class="container">
    <section class="checkout-form">
        <h1 class="heading">Complete your order</h1>


        <form action="" method="post">
            <div class="display-order">
                <?php
                
                    $select_cart= mysqli_query($conn, "SELECT * FROM `cart`");
                    $total=0;
                    $grand_total=0;
                    if(mysqli_num_rows($select_cart)){
                        while($fetch_cart= mysqli_fetch_assoc($select_cart)){
                            $total_price= $fetch_cart['quantity'] * $fetch_cart['price'];
                            $grand_total= $total+=$total_price;
                ?>
                    <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                <?php
                
                        }
                    }else{
                        echo "<div class='display-order'><span>your cart is emppty!</span></div>";
                    }
                
                ?>
                <span class="grand-total">grand: <?= $grand_total;?></span>
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>your name</span>
                    <input type="text" placeholder="enter your name" name="name" required>
                </div>
                <div class="inputBox">
                    <span>your number</span>
                    <input type="number" placeholder="enter your number" name="number" required>
                </div>
                <div class="inputBox">
                    <span>your gmail</span>
                    <input type="email" placeholder="enter your gmail" name="gmail" required>
                </div>
                <div class="inputBox">
                    <span>payment method</span>
                    <select name="method" >
                        <option value="cash on delivery" selected>cash on devlivery</option>
                        <option value="credit cart">credit cart</option>
                        <option value="paypal">paypal</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>address</span>
                    <input type="text" placeholder="enter your address" name="diachi" required>
                </div>               
                
            </div>
            <input type="submit" value="order now" name="order_btn" class="btn">
        </form>
    </section>
</div>


<!-- footer -->
<?php include 'footer.php'; ?>
 
</body>
</html>
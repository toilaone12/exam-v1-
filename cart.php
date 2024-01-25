<?php

@include 'config.php';

if(isset($_POST['update_update_btn'])){
    $update_value= $_POST['update_quantity'];
    $update_id=$_POST['update_quantity_id'];
    $update_quantity_query= mysqli_query($conn, "UPDATE `cart` SET quantity='$update_value' WHERE id ='$update_id' ");
    if($update_quantity_query){
        header('location:cart.php');
    }
}

// xoa tung san pham gio hang
if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id='$remove_id' ");
    header('location:cart.php');
}

// xoa het tat ca san pham
if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart` ");
    header('location:cart.php');
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
    <section class="shopping-cart">
        <h1 class="heading">Shopping cart</h1>
        <table>
            <thead>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th>quantity</th>
                <th>total price</th>
                <th>action</th>
            </thead>
            <tbody>

            <?php
            
                $select_cart=mysqli_query($conn,"SELECT * FROM `cart`");
                $grand_total=0;
                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            
            ?>

            <tr>
                <td><img src="./public/img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                <td><?php echo $fetch_cart['name']; ?></td>
                <td><?php echo $fetch_cart['price']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" min="1" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                        <input type="number" min="1" name="update_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                        <input type="submit" value="update" name="update_update_btn">
                    </form>
                </td>
                <td><?php echo $sub_total= $fetch_cart['price'] * $fetch_cart['quantity']; ?></td>
                <td><a href="cart.php?remove= <?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?')"><i class="fas fa-trash"></i>remove</a></td>
            </tr>


            <?php
            $grand_total += $sub_total;
                    }
                }  
                
            ?>
            <tr class="table-bottom">
                <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping cart</a></td>
                <td colspan="3"><b>GRAND TOTAL:</b></td>
                <td><?php echo $grand_total; ?></td>
                <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"><i class="fas fa-trash"></i>delete all</a></td>
            </tr>
            </tbody>
        </table>

        <div class="checkout-btn">
            <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled';  ?>">procced to checkout</a>
        </div>
    </section>
  </div>

  
  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
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

  <!-- -->
  <?php include 'footer.php'; ?>

</body>

</html>
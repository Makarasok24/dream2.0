<?php
global $con;
include "connection.php";
//include "menu.php";

    if(isset($_POST['increment'])){
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_quantity_id'];
        $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
        if($update_quantity_query){
           header('location:Add_to_cart.php');
        };
     };
     
     if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        mysqli_query($con, "DELETE FROM `cart` WHERE id = '$remove_id'");
        header('location:Add_to_cart.php');
     };
     if(isset($_GET['cancel_order'])){
        mysqli_query($con, "DELETE FROM `cart`");
        header('location:Add_to_cart.php');
     }
     

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
     integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="add_to_cart.css">
    <title>Add to cart</title>
</head>
<body>
    <div class="cart">
        <div class="shopping">
            <div class="title-shop">
                <h2>Shopping Cart</h2>
            </div>
            <div class="pro-quan-price">
                <p class="product-">Product</p>
                <p class="quantity-">Quantity</p>
                <p class="price-">Price</p>
            </div>
            <div class="product_added">
            <?php 
         
                $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
                    $grand_total = 0;
                    if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            ?>
                
                <div class="cart_product">
                    <div class="product_">
                        <div class="product-img">
                            <img src="<?php echo $fetch_cart['image']; ?>" width="100px" alt="product1">
                        </div>
                        <div class="product-name">
                            <h3><?php echo $fetch_cart['name']; ?></h3>
                            <p>Size: <span class="color_"><?php echo $fetch_cart['size']; ?></span></p>
                        </div>
                    </div>
                        <div class="quantity">
                            <form action="" method="post">
                                <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                                <input type="number" name="update_quantity" min="1" max="10" value="<?php echo $fetch_cart['quantity']; ?>">
                                <button type="submit" name="increment"class="btn-update-quantitty"><i class="fa-solid fa-check"></i></button>
                            </form>
                        </div>
                        <div class="price_">
                            <p>$<?php  

                                $price_each_prod = $fetch_cart['price'];
                                echo $price_each_prod;
                            
                            ?></p>
                            <?php $sub_total = $fetch_cart['price'] * $fetch_cart['quantity']; 
                                  $grand_total += $sub_total;
                            ?>
                        </div>
                        <span class="btn-delete"><a href="Add_to_cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')"><i class="fa-regular fa-trash-can"></i></a></span>
                </div>
                <?php

                    };
                };
                ?>
            </div>
            <div class="btn-back-cancel">
                <button class="btn_back" onclick="goBack()">Back</button>
                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>
                <a href="Add_to_cart.php?cancel_order" onclick="return confirm('are you sure want to cancel order?');"><button class="btn_cancel">Cancel Order</button></a>
            </div>
        </div>
        <div class="coupon-order-pay">
            <div class="coupon">
                <div class="title-coupon">
                    <h2>Coupon Code</h2>
                </div>
                <div class="input-code">
                    <input type="text" placeholder="Enter Your Coupon Code">
                </div>
                <button class="btn-apply-coupon">Apply Your Coupon</button>
            </div>
            <div class="order">
                <div class="title-order">
                    <h2>Order Summary</h2>
                </div>
                <div class="summary">
                    <div class="discount">
                        <p>Discount</p>
                        <p class="price">$00.00</p>
                    </div>
                    <div class="delivery">
                        <p>Delivery</p>
                        <p class="price">$2.00</p>
                    </div>
                    <div class="subtotal">
                        <p>Subtotal</p>
                        <p class="subtotal-price">$<?php echo number_format($grand_total, 2); ?></p>
                    </div>
                </div>
            </div>
            <div class="checkout">
                <div class="title-shipping">
                    <h2>Check Order</h2>
                </div>
                <div class="check_">
                    <div class="subtotal">
                            <p>Subtotal</p>
                            <p class="price">$<?php echo number_format($grand_total, 2); ?></p>
                        </div>
                    <div class="free">
                        <p>Free Shipping(Buy 2 or more)</p>
                        <?php
                            $check_cart = mysqli_query($con, "SELECT * FROM `cart`");
                            $delivery = '2.00';
                            $total = 0;
                            if(mysqli_num_rows($check_cart) > 1){
                                $total = $grand_total;
                                echo "<p class='price'>$00.00</p>";
                            }else{
                                $total = $grand_total + $delivery;
                                echo "<p class='price'>$"."$delivery". "</p>";
                            }
                        ?>
                        
                    </div>
                </div>
                <div class="total_price">
                    <p>Total</p>
                    <p style="color: #ff0000;"><b>$<?php echo number_format($total, 2);?></b></p>
                </div>
                <a href="checkout.php">
                <button class="btn-check" type="submit" name="checkout">Check Out</button>
                </a>
            </div>
        </div>
    </div>

    
    
</body>
</html>
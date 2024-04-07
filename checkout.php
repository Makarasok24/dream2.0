<?php
    session_start();

    if(!$_SESSION['login'] && !$_SESSION['success']){
      header('location:login.php'); 
    } 
?>

<style>
    @font-face {
        font-family: TeXGyreAdventor;
        src: url(Font/texgyreadventor-bold.otf);
    }
    body{
        font-family: TeXGyreAdventor, serif;
    }                                                     
</style>

<?php
global $con;
include "connection.php";
if(isset($_POST['btn_order'])){
    // Check if the fileToUpload key is set in the $_FILES array
    if (isset($_FILES["fileToUpload"])) {
        // Check if file was uploaded without errors
        if ($_FILES["fileToUpload"]["error"] == 0) {
            // Allow only certain file formats
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");
            $fileExtension = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedExtensions)) {
                ?>
                <div class="alert alert-danger alert-dismissible fade show position-sticky top-0" role="alert">
                    <strong>Sorry!</strong> only JPG, JPEG, PNG, and GIF files are allowed.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            } else {
                // Move uploaded file to destination folder
                // $uploadDirectory = "upload_img/"; // Change this to your desired destination folder
                $uploadedFilePath = ($_FILES["fileToUpload"]["name"]);
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"upload_img/". $uploadedFilePath)) {
                    // Proceed with the order confirmation details
                    // Fetch form data
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $country = $_POST['country'];
                    $streetLine1 = $_POST['street-1'];
                    $streetLine2 = $_POST['street-2'];
                    $city = $_POST['city'];
                    $state = $_POST['state'];
                    $postcode = $_POST['postcode'];
                    $payment_img = "upload_img/".$uploadedFilePath;

                    // Fetch cart items
                    $cart_query = mysqli_query($con, "SELECT * FROM `cart`");
                    $price_total = 0;
                    $product_names = [];
                    while($product_item = mysqli_fetch_assoc($cart_query)){
                        $product_names[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
                        $quantity = $product_item['quantity'];
                        $product_name = $product_item['name'];
                        $product_price = $product_item['price'] * $product_item['quantity'];
                        $price_total += $product_price;
                    }
                    $total_dollar = 0;
                    $total_riel = 0;
                    $delivery = '2.00';
                    if(mysqli_num_rows($cart_query) > 1){
                        $total_dollar = $price_total;
                        $total_riel = 4100 * $total_dollar;
                    }else{
                        $total_dollar = $price_total + $delivery;
                        $total_riel = 4100 * $total_dollar;
                    }

                    $total_product = implode('<br> ', $product_names);

                    // Display order details and confirmation form
                    ?>
                    <div class='order-message-container'>
                        <div class='message-container'>
                            <h3>Verify Your Order</h3>
                            <div class='order-detail'>
                                <span><?php echo $total_product; ?></span>
                                <span class='total'> Total : ($) <?php echo number_format($total_dollar, 2); ?> =  (៛) <?php echo number_format($total_riel, 2); ?></span>
                            </div>
                            <div class='customer-details'>
                                <p> First Name : <span><?php echo $first_name; ?></span> </p>
                                <p> Last Name : <span><?php echo $last_name; ?></span> </p>
                                <p> Phone Number : <span><?php echo $phone; ?></span> </p>
                                <p> Email Address : <span><?php echo $email; ?></span> </p>
                                <p> Country : <span><?php echo $country; ?></span> </p>
                                <p> Address : <span><?php echo $city.", ".$streetLine1.", ". $streetLine2.", ".$state; ?></span> </p>
                                <p> Postcode/ZIP : <span><?php echo $postcode; ?></span> </p>
                            </div>
                            <div class='modal-footer mt-2'>
                                <button type='button' onclick='hideElement(this)' class='btn btn-secondary m-1' data-dismiss='modal'>Close</button>
                                <form method='post'>
                                    <button type='submit' name='confirm_order' class='btn btn-primary m-1'>Confirm</button>
                                    <input type="hidden" name="first_name" value="<?php echo $first_name; ?>">
                                    <input type="hidden" name="last_name" value="<?php echo $last_name; ?>">
                                    <input type="hidden" name="phone" value="<?php echo $phone; ?>">
                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                    <input type="hidden" name="country" value="<?php echo $country; ?>">
                                    <input type="hidden" name="streetLine1" value="<?php echo $streetLine1; ?>">
                                    <input type="hidden" name="streetLine2" value="<?php echo $streetLine2; ?>">
                                    <input type="hidden" name="city" value="<?php echo $city; ?>">
                                    <input type="hidden" name="state" value="<?php echo $state; ?>">
                                    <input type="hidden" name="postcode" value="<?php echo $postcode; ?>">
                                    <input type="hidden" name="payment_img" value="<?php echo $payment_img; ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    // Error moving file
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show position-sticky top-0" role="alert">
                        <strong>Error!</strong> There was an error uploading your file.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
            }
        } else {
            // Error uploading file
            ?>
            <div class="alert alert-danger alert-dismissible fade show position-sticky top-0" role="alert">
                <strong>Error!</strong> There was an error uploading your file.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
    }
?>
<?php
 }elseif(isset($_POST['confirm_order'])) {
        // Insert order details into the database
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $streetLine1 = $_POST['streetLine1'];
        $streetLine2 = $_POST['streetLine2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postcode = $_POST['postcode'];
        $payment_img = $_POST['payment_img'];

        $cart_query = mysqli_query($con, "SELECT * FROM `cart`");
        $price_total = 0;
        while($product_item = mysqli_fetch_assoc($cart_query)){
            $quantity = $product_item['quantity'];
            $product_name = $product_item['name'];
            $product_price = $product_item['price'] * $product_item['quantity'];
            $price_total += $product_price;

        $detail_query = mysqli_query($con, "INSERT INTO `orders` (first_name, last_name, product_name,email,quantity, total_price) 
        VALUES ('$first_name', '$last_name', '$product_name', '$email', '$quantity', '$product_price')");     
        }
        $payment_sql = mysqli_query($con, "INSERT INTO `payment` (total_price ,pay_img,first_name,last_name,email) 
        VALUES ('$price_total','$payment_img','$first_name','$last_name','$email')");
    
    
    if($detail_query) {
        // echo "Order inserted successfully";
        header("location: thank_you.php");
    } else {
        // Error occurred during insertion
        echo "Error: " . mysqli_error($con);
    }
    }

    if(isset($_POST['confirm_order'])){
        $sql = "DELETE FROM `cart`";
        $result = $con->query($sql);

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
     integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="checkout.css">
    <title>Checkout</title>
</head>
<body>
    <div class="container mt-5">
        <div class="title">
            <h2>Checkout</h2>
        </div>
        <form action="" method="post" role="form" enctype="multipart/form-data">
        <div class="checkout mt-4">
            <div class="billing_details">
                <div class="title_billing">
                <h4>Billing Details</h4>
                </div>
                    <div class="row mt-3">
                        <div class="form-group col">
                            <label for="">First Name <span class="required">*</span></label>
                            <input type="text" name="first_name" class="form-input" id="" placeholder="First Name" required>
                        </div>
                        <div class="form-group col">
                            <label for="">Last Name <span class="required">*</span></label>
                            <input type="text" name="last_name" class="form-input" id="" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Phone Number <span class="required">*</span></label>
                        <input type="text" name="phone" class="form-input" id="" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Email Address <span class="required">*</span></label>
                        <input type="email" name="email" class="form-input" id="" placeholder="Email Address" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">County / Region <span class="required">*</span></label>
                        <select name="country" class="form-input">
                            <option value="Cambodia">Cambodia</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Street address Line 1 <span class="required">*</span></label>
                        <input type="text" name="street-1" class="form-input"  placeholder="House number and street name" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Street address Line 2 <span class="required">*</span></label>
                        <input type="text" name="street-2" class="form-input mt-2" placeholder="Apartment, suite, unit, etc. (optional)">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Town / City <span class="required">*</span></label>
                        <input type="text" name="city" class="form-input" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">State / County <span class="required">*</span></label>
                        <input type="text" name="state" class="form-input" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Postcode / ZIP <span class="required">*</span></label>
                        <input type="text" name="postcode" class="form-input" required>
                    </div>
            </div>
            <div class="order">
                <div class="your_order">
                    <div class="title_order">
                        <h4>Your Order</h4>
                    </div>
                    <div class="product-subtotal-result">
                        <div class="product-subtotal">
                            <p>Product</p>
                            <p class="mr">Subtotal</p>
                        </div>
                        <?php
                        $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
                        $grand_total = 0;
                        $total = 0;
                        if(mysqli_num_rows($select_cart) > 0){
                        while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                            $grand_total = $fetch_cart['price'] * $fetch_cart['quantity'];
                            $total += $grand_total;
                        ?>
                        <div class="result_order">
                            <p><?php echo $fetch_cart['name'] ?> <span><i class="fa-solid icon fa-xmark"></i></span> <?php echo $fetch_cart['quantity'] ?></p>
                            <p class="mr_num">$<?php echo $grand_total ?></p>
                        </div>
                        <?php
                                };
                            };
                        ?> 
                    </div>
                    <div class="free">
                        <p>Free Shipping(Buy 2 or more)</p>
                        <?php
                            $check_cart = mysqli_query($con, "SELECT * FROM `cart`");
                            $delivery = '2.00';
                            $total_dollar = 0;
                            $total_riel = 0;
                            if(mysqli_num_rows($check_cart) > 1){
                                $total_dollar = $total;
                                $total_riel = 4100 * $total_dollar;
                                echo "<p class='mr_num'>$00.00</p>";
                            }else{
                                $total_dollar = $total + $delivery;
                                $total_riel = 4100 * $total_dollar;
                                echo "<p class='mr_num'>$"."$delivery". "</p>";
                            }
                        ?>
                    </div>
                    <div class="subtotal">
                        <p>Subtotal</p>
                        <p class="mr_num">$<?php echo number_format($grand_total, 2); ?></p>
                    </div>
                    <div class="total_price">
                        <div class="total">
                            <p>Total</p>
                        </div>
                        <div class="price">
                            <p>($) <?php echo number_format($total_dollar, 2)?></p>
                            <p>(<span class="riel">៛</span>) <?php echo number_format($total_riel, 2); ?></p>
                        </div>
                    </div>
                </div>
                <div class="place_order">
                    <div class="title_qr">
                        <h4>Scan. Pay Done.</h4>
                    </div>
                    <div class="QR">
                        <img src="Wallpaer/dollar.jpg" width="240px" alt="dollar">
                        <img src="Wallpaer/riel.jpg" width="240px" alt="riel">
                    </div>
                        <div class="form-group mt-3">
                            <label for="">Please upload your paid photos here. <span class="required">*</span></label>
                            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                        </div>
                    <button type="submit" class="btn-order mt-3" name="btn_order" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Place order</button>
                    <button class="btn-orderz mt-3" name="btn_order" onclick="goToAddCar()">Back</button>
                    <script>
                        function goToAddCar() {
                            window.location.href = 'Homepage.php';
                        }
                    </script>

                </div>
            </div>
        </div>
        </form>
    </div>
    <script>
        function hideElement(element) {
            var containers = document.querySelectorAll('.order-message-container');
            containers.forEach(function(container) {
                container.style.display = 'none';
            });
        }

    </script>
</body>
</html>
<script>


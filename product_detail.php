<?php
global $con;
include "connection.php";
 include "menu.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="pro.detail.css">
    <title>Product detail</title>
    <style>
        body{
            font-family: TeXGyreAdventor, serif;
        }
    </style>
</head>
<body>

<?php
if(isset($_POST['add_to_cart'], $_POST['size'])){
    $product_size = $_POST['size'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_img = $_POST['product_img'];
    ;
    $product_quantity = 1;

    $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE name = '$product_name'");
    if(mysqli_num_rows($select_cart) > 0){
        $message[] = 'product already added to cart';
    }else{
        $insert_product = mysqli_query($con, "INSERT INTO `cart`(name, price, image, quantity, size) VALUES('$product_name', '$product_price', '$product_img', '$product_quantity', '$product_size')");
        $message[] = 'Product added to cart succesfully';
    }
}elseif(isset($_POST['add_to_cart'])){
    $message_error[] = 'Please choose your size';
}
if(isset($message)){
    foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span> <i class="fa-solid fa-xmark" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    };
};
if(isset($message_error)){
    foreach($message_error as $message_error){
        echo '<div class="message_error"><span>'.$message_error.'</span> <i class="fa-solid fa-xmark" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    };
};

$product_id = $_GET["id"];

$sqlProductDetail = "SELECT * FROM products
          INNER JOIN category ON products.category_id = category.id
          INNER JOIN  image  ON products.image_id  = image.id 
          WHERE products.id=$product_id";


$result = $con->query($sqlProductDetail);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row["product_name"];
        $price = $row["price"];
        $brand = $row["brand"];
        $category = $row["category_name"];
        $image_1 = $row['product_image'];
        $image_2 = $row['image_2'];
        $image_3 = $row['image_3'];
        $descritiondb = $row['description'];
//
    }
}
?>
<div class="container">
    <form action="" method="post">
        <div class="product">
            <div class="product-image">
                <div class="gallery">
                    <img src="<?=$image_1 ?>" class="active" onmouseover="changeImage(this)" alt="Product 1">
                    <img src="<?=$image_2 ?>" onmouseover="changeImage(this)" alt="Product 2">
                    <img src="<?=$image_3 ?>" onmouseover="changeImage(this)" alt="Product 3">
                </div>
                <div class="main-img">
                    <img src="<?=$image_1 ?>" id="main-image" alt="Product 1">
                    <input type="hidden" name="product_img" value="<?php echo $image_1 ?>">
                    <div class="btn">
                        <button class="prev-btn" onclick="prevImage()"><i class="fa-solid fa-chevron-left"></i></button>
                        <button class="next-btn" onclick="nextImage()"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="product-details">
                <div class="title">
                    <h3>Sustainable Materials</h3>
                    <h1><?=$name?></h1>
                    <input type="hidden" name="product_name" value="<?php echo $name ?>">
<!--                    <h4>Men's Nike Dri-FIT Football Pre-Match Top</h4>-->
                    <h4><?php echo $descritiondb?></h4>

                </div>
                <div class="price">
                    <?php echo "<p> $" .$price. "</p>"; ?>
                    <input type="hidden" name="product_price" value="<?php echo $price ?>">
                </div>
                <div class="choose_color">
                    <div class="any_color">
                        <input type="radio" id="color1" name="color">
                        <?php echo "<label for='color1'><img src='$image_1'</label>";?>
                    </div>
                    <!-- <div class="any_color">
                      <input type="radio" id="color2" name="color">
                      <label for="color2"><img src="https://static.nike.com/a/images/t_PDP_144_v1/f_auto/649b4c80-6b4d-4b0c-84fa-64a6e10e03ff/fc-barcelona-academy-pro-se-dri-fit-football-pre-match-top-rkgx05.png" alt=""></label>
                    </div> -->
                </div>
                <div class="select_size">
                    <div class="select">
                        <p>Select Size</p>
                        <p style="color: #747474;">Size Guide</p>
                    </div>
                    <div class="choose_size">
                        <div class="any_size">
                            <input type="radio" id="size-small" name="size" value="S">
                            <label for="size-small">S</label>
                        </div>
                        <div class="any_size">
                            <input type="radio" id="size-medium" name="size" value="M">
                            <label for="size-medium">M</label>
                        </div>
                        <div class="any_size">
                            <input type="radio" id="size-large" name="size" value="L">
                            <label for="size-large">L</label>
                        </div>
                        <div class="any_size">
                            <input type="radio" id="size-xl" name="size" value="XL">
                            <label for="size-xl">XL</label>
                        </div>
                        <div class="any_size">
                            <input type="radio" id="size-xxl" name="size" value="XXL">
                            <label for="size-xxl">XXL</label>
                        </div>
                    </div>
                </div>
                <div class="confirm">
                    <p>Available at checkout.</p>
                </div>
                <div class="buttons">
                    <button class="add-to-cart" type="submit" name="add_to_cart">Add to Cart</button>

                </div>
                <div class="description lh-lg">
                    <p>After conquering the basics, take your skills to the next level.
                        A relaxed fit works together with moisture-wicking technology
                        to help keep you cool when your training heats up.</p>
                    <div class="Benefits">
                        <h3>Benefits</h3>
                        <ul>
                            <li>Nike Dri-FIT technology moves sweat away from your skin for quicker evaporation, helping you stay dry and comfortable.</li>
                            <li>Lightweight knit fabric feels smooth against your skin.</li>
                        </ul>
                    </div>
                    <div class="Product_details">
                        <h3>Product details</h3>
                        <ul>
                            <li>100% polyester</li>
                            <li>Machine wash</li>
                            <li>Imported
                                <ul>
                                    <li>Colour Shown: Deep Royal Blue/Deep Royal Blue/Noble Red/Club Gold</li>
                                    <li>Style: FJ5430-456</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </form>
</div>
<script src="pro.detail.js"></script>
</body>
</html>
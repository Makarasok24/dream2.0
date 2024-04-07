<?php

global $con;
include "connection.php";
include "menu.php";

?>
<!doctype html>
<html lang="en" xmlns="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="image/1.png"/>
    <title>Jordan</title>
    <link rel="stylesheet" href="brand_display.css">
    <link rel="stylesheet" href="team.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/path/to/fontawesome/all.css" />
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/04762201f9.js" crossorigin="anonymous"></script>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <!-- Link to the file hosted on your server, -->
    <link rel="stylesheet" href="path-to-the-file/splide.min.css">
    <!-- or link to the CDN -->
    <link rel="stylesheet" href="url-to-cdn/splide.min.css">


<body>

<div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
</div>

<div class="splide">
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide"><img src="Wallpaer/bbbb1.png" alt="" width="100%"; height="200px;"></li>
            <li class="splide__slide"><img src="Wallpaer/bbbb2.png" alt="" width="100%"; height="200px;"></li>
            <li class="splide__slide"><img src="Wallpaer/bbbb3.png" alt="" width="100%"; height="200px;"></li>



        </ul>
    </div>
    <!-- Add the progress bar element -->
    <div class="my-slider-progress">
        <div class="my-slider-progress-bar"></div>
    </div>
</div>

<script>
    var splide = new Splide( '.splide', {
        autoplay: true,
        interval: 6000,
        type: 'loop',
    });

    var bar = splide.root.querySelector('.my-carousel-progress-bar');

    // Updates the bar width whenever the carousel moves:
    splide.on('mounted move', function () {
        var end  = splide.Components.Controller.getEnd() + 1;
        var rate = Math.min((splide.index + 1) / end, 1);
        bar.style.width = String(100 * rate) + '%';
    });
    splide.mount();
</script>


<div class="container-fluid">
    <div class="lgo mt-4"><img src="/image/1.png" style="margin-left: 47%" height="100px"></div>
    <h1 style="font-family: TeXGyreAdventor; text-align: center">JORDAN</h1>
    <div class="row">
        <?php
        # Connect with mysqli
        $sql = "SELECT p.product_name, i.product_image, p.category_id, p.price, c.category_name, p.type_feature, p.id,p.brand
                FROM products p
                INNER JOIN category c ON p.category_id = c.id
                INNER JOIN image i ON p.image_id = i.id 
                WHERE p.brand = 'JORDAN'";

        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product_id = $row["id"];
                $name = $row["product_name"];
                $image = $row["product_image"];
                $category = $row["category_name"];
                $price = $row["price"];
                $brand = $row["brand"];
                echo "<div class='col-3 cart_pro animate__animated  animate__fadeInUp'>
                        <a href='product_detail.php?id=$product_id' style='text-decoration: none'>
                            <div class='card p-5  pl-5 '>
                                <img class='animate__animated  animate__fadeInUp' src='$image' alt='BK'>
                                <div class='description'>
                                <h4>$name</h4>
                                <h3 class='text-danger animate__animated  animate__fadeInRight'>$ $price</h3>
                                <h5 class='text-black-50'>$brand</h5>
                                <h5 class='text-black-50'>$category</h5>
                                </div>
                            </div></a>
                        </div>";

            }
        }

        ?>
    </div>

</div>
<div class="footer d-flex justify-content-between">
    <div class="t1">
        <h1 style="font-family: TeXGyreAdventor,serif;color: white;font-size: 34px;">SUPPORT</h1>
        <p class="tds" style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Contact Us</p>
        <p class="tds " style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Shipping and Delivery</p>
        <p class="tds" style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Return Policy</p>
        <p class="tds" style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Terms & Conditions</p>
        <p class="tds" style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Privacy Policy</p>
        <p class="tds" style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Transparency in Supply Chain</p>
        <p class="tds" style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Store Locator</p>
    </div>
    <div class="t2">
        <h1 style="font-family: TeXGyreAdventor,serif;color: white;font-size: 34px;">ABOUT</h1>
        <p class="tds" style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Company</p>
        <p class="tds" style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Corporate News</p>
        <p class="tds" style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Press Center</p>
        <p class="tds" style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Investors</p>
        <p class="tds" style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Sustainability</p>
        <p class="tds" style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Careers</p>

    </div>
    <div class="t3">
        <h1 style="font-family: TeXGyreAdventor,serif;color: white;font-size: 34px;">STAY UP TO DATE</h1>
        <p class="tds" style="font-family: TeXGyreAdventor-r,serif; font-size: 15px">Sign Up for Email</p>
        <h1 style="font-family: TeXGyreAdventor,serif;color: white;font-size: 30px;">EXPLORE</h1>
        <div class="row">
            <div class="col-sm-4">

                <div class="element"><img src="lOGO/nike_w.png" alt="thy" height="80px"></div>
            </div>
            <div class="col-sm-4 ">

                <div class="element"><img src="lOGO/j_w.png" alt="thy" height="80px"></div>
            </div>
            <div class="col-sm-4">

                <div class="element"><img src="lOGO/puma_w.png" alt="thy" height="80px"></div>
            </div>
        </div>
        <!-- Second Row -->
        <div class="row">
            <div class="col-sm-4 mt-4 ">

                <div class="element"><img src="lOGO/addas_w.png" alt="thy" height="55px" style="margin-left: 25px"></div>
            </div>
            <div class="col-sm-4 mt-4">

                <div class="element"><img src="lOGO/jardan_w.png" alt="thy" height="57"></div>
            </div>
            <div class="col-sm-4 mt-2">

                <div class="element"><img src="lOGO/convers.png" alt="thy" height="80px"></div>
            </div>
        </div>

    </div>

    <div class="line"></div>

    <div class="logo">
        <i class="fa-brands fa-facebook fa-2xl" style="color: #ffffff;"></i>
        <i class="fa-brands fa-youtube fa-2xl" style="color: #ffffff;"></i>
        <i class="fa-brands fa-telegram fa-2xl" style="color: #ffffff;"></i>
        <i class="fa-brands fa-x-twitter fa-2xl" style="color: #ffffff;"></i>
    </div>

    <div class="tddd">
        <p  style="font-family: TeXGyreAdventor-r,serif; font-size: 10px"><i class="fa-regular fa-copyright" style="color: #ffffff;"></i> DREAM NORTH AMERICA, INC.</p>
        <p class="tds1" style="font-family: TeXGyreAdventor-r,serif; font-size: 7px"> IMPRINT D LEGAL DATA</p>
    </div>

</body>

</html>


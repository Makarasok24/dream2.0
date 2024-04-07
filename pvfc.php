<?php

global $con;
include "connection.php";
    include "menu.php";

?>
<style>
    body {
        margin: auto;
        /*font-family: -apple-system, BlinkMacSystemFont, sans-serif;*/
        overflow: auto;
        background: linear-gradient(315deg, rgb(241, 217, 217) 3%, rgb(223, 237, 201) 38%, rgb(205, 197, 227) 68%, rgb(169, 208, 246) 98%);
        animation: gradient 15s ease infinite;
        background-size: 400% 400%;
        background-attachment: fixed;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 0%;
        }
        50% {
            background-position: 100% 100%;
        }
        100% {
            background-position: 0% 0%;
        }
    }

    .wave {
        background: rgb(255 255 255 / 25%);
        border-radius: 1000% 1000% 0 0;
        position: fixed;
        width: 200%;
        height: 12em;
        animation: wave 10s -3s linear infinite;
        transform: translate3d(0, 0, 0);
        opacity: 0.8;
        bottom: 0;
        left: 0;
        z-index: -1;
    }

    .wave:nth-of-type(2) {
        bottom: -1.25em;
        animation: wave 18s linear reverse infinite;
        opacity: 0.8;
    }

    .wave:nth-of-type(3) {
        bottom: -2.5em;
        animation: wave 20s -1s reverse infinite;
        opacity: 0.9;
    }

    @keyframes wave {
        2% {
            transform: translateX(2px);
        }

        25% {
            transform: translateX(-25%);
        }

        50% {
            transform: translateX(-50%);
        }

        75% {
            transform: translateX(-25%);
        }

        100% {
            transform: translateX(2px);
        }
    }


    .animate__animated.animate__fadeInUp {
        --animate-duration: 2s;
    }

</style>
<!-- slider -->
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


<div class="splide">
<div class="splide__track">
    <ul class="splide__list">
        <li class="splide__slide"><img src="Wallpaer/pp3.png" alt="" width="100%"; height="200px;"></li>
        <li class="splide__slide"><img src="Wallpaer/pp2.png" alt="" width="100%"; height="200px;"></li>
        <li class="splide__slide"><img src="Wallpaer/pp1.png" alt="" width="100%"; height="200px;"></li>

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
<div class="">
    <div class="ads w-100" style="background-image: url(lOGO/staduim.jpg); ">
        <div class="brand_club d-flex justify-content-center">
            <img  src="lOGO/PrevengFC.png" height="200px" style="padding-top: 10px;" alt="">
        </div>
        <div class="card_shirt  ">
            <div class="row " style="padding-top: 50px;padding-bottom: 20px;">
                <div class="col-4">
                    <img  src="lOGO/ppCover_1.jpg" class="d-block w-100 shadow rounded" alt="">
                </div>
                <div class="col-4">
                    <img src="lOGO/ppCover_2.jpg" class="d-block w-100 shadow rounded" alt="">
                </div>
                <div class="col-4">
                    <img src="lOGO/ppcCover_3.jpg" class="d-block w-100 shadow rounded" alt="">
                </div>
            </div>
        </div>

    </div>

</div>

<div class="container">
    <h1 style="font-family: TeXGyreAdventor;">Prey Veng FC</h1>
    <div class="row">
    <?php

    $sql = "SELECT p.product_name, i.product_image, p.category_id, p.price, c.category_name, p.type_feature, p.id , p.brand
    FROM products as p
    INNER JOIN category as c ON p.category_id = c.id
    INNER JOIN image as i ON p.image_id = i.id
    WHERE p.brand='Prey Veng FC'
    ";
    $result = $con->query($sql);

       if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { 
            $name = $row["product_name"];
            $price = $row["price"];
            $brand = $row["brand"];
            $category = $row["category_name"];
            $image = $row["product_image"];
            $product_id = $row["id"];

            echo "<div class='col-4'> 
                <a href='product_detail.php?id=$product_id'>
                    <div class='card p-2'>
                            <img src='$image' alt='BK'>
                            <div class='description'>
                            <h4 style='font-family: TeXGyreAdventor, serif; font-size: 20px;'>$name</h4>
                            <h3 class='text-danger' style='font-family: TeXGyreAdventor, serif; font-size: 20px;'>$ $price</h3>
                            <p style='font-family: TeXGyreAdventor, serif; font-size: 20px;'>$brand</p>
                            <h5 class='text-black-50'style='font-family: TeXGyreAdventor, serif; font-size: 20px;'>$category</h5>
                            </div>
                    </div></a>
            </div>"; 
            
        }
   }

    ?>
    </div>
    
</div>



<?php include "footer.php"; ?>
</body>
</html>


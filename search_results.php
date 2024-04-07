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
    <link rel="stylesheet" href="search.css">
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
    <link rel="stylesheet" href="path-to-the-file/splide.min.css">
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

    splide.on('mounted move', function () {
        var end  = splide.Components.Controller.getEnd() + 1;
        var rate = Math.min((splide.index + 1) / end, 1);
        bar.style.width = String(100 * rate) + '%';
    });
    splide.mount();
</script>


<div class="container-fluid">
    <h1 style="font-family: TeXGyreAdventor; padding-left:22px">Search Results:</h1>
    <?php
//    echo '$riw';

    ?>
    <h1 style="font-family: TeXGyreAdventor; padding-left:22px"></h1>
    <div class="row">
        <?php

        if(isset($_POST['search_text'])) {

            $search = $_POST['search_text'];

            $query = "SELECT p.product_name, i.product_image, p.category_id, p.price, c.category_name, p.type_feature, p.id,p.brand
                    FROM products p
                    INNER JOIN category c ON p.category_id = c.id
                    INNER JOIN image i ON p.image_id = i.id 
                    WHERE product_name LIKE ?";

            $stmt = mysqli_prepare($con, $query);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $searchPattern);
                $searchPattern = '%' . $search . '%';
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($result) {
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $product_id = $row["id"];
                            $name = $row["product_name"];
                            $image = $row["product_image"];
                            $category = $row["category_name"];
                            $price = $row["price"];
                            $brand = $row["brand"];
                            echo "<div class='col-md-3 col-sm-6 cart_pro animate__animated animate__fadeInUp'>
                                <a href='product_detail.php?id=$product_id' style='text-decoration: none'>
                                    <div class='card p-5 pl-5'>
                                        <img class='animate__animated animate__fadeInUp' src='$image' alt='BK'>
                                        <div class='description'>
                                            <h4>$name</h4>
                                            <h3 class='text-danger animate__animated animate__fadeInRight'>$ $price</h3>
                                            <h5 class='text-black-50'>$brand</h5>
                                            <h5 class='text-black-50'>$category</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>";
                        }
                    } else {
                        echo "<div class='col-md-12'><h5 style='font-family: TeXGyreAdventor; padding-left: 22px;'>Search not found :).</h5></div>";
                    }
                }
                mysqli_stmt_close($stmt);
            }
        } else {
            echo "<div class='col-md-12'><h5 style='font-family: TeXGyreAdventor; padding-left: 22px;'>You didn't search yet :).</h5></div>";


        }
        ?>
    </div>
</div>

<?php
include "footer.php";
?>
</body>
</html>










































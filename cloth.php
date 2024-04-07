<?php
global $con;
include "connection.php";
?>
<!doctype html>
<html lang="en" xmlns="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cloth</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="team.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/path/to/fontawesome/all.css" />
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/04762201f9.js" crossorigin="anonymous"></script>
    <!-- Link to the file hosted on your server, -->
    <link rel="stylesheet" href="path-to-the-file/splide.min.css">
    <!-- or link to the CDN -->
    <link rel="stylesheet" href="url-to-cdn/splide.min.css">
    <script>
        document.addEventListener( 'DOMContentLoaded', function () {
            new Splide( '#ar' ).mount();
        } );
    </script>

<body>
<?php
require "menu.php";
?>


<div class="splide">
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide"><img src="Wallpaer/2.png" alt="" width="100%"; height="700px;"></li>
            <li class="splide__slide"><img src="Wallpaer/3.png" alt="" width="100%"; height="700px;"></li>
            <li class="splide__slide"><img src="Wallpaer/bander3.png" alt="" width="100%"; height="700px;"></li>
            <li class="splide__slide"><img src="Wallpaer/5.png" alt="" width="100%"; height="700px;"></li>
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


<div class="t">
    <h3 STYLE="font-family: TeXGyreAdventor, serif; text-align: center; color: white; position: absolute; margin-top: 9px;margin-left: 9px">NEW ARRIVALS </h3>
</div>

<div class="product_slide">
    <section id="splide-slider" class="splide" aria-label="Slide Container Example">
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                # Connect with mysqli
                $sql = "SELECT p.product_name, i.product_image, p.category_id, p.price, c.category_name, p.type_feature, p.id
                FROM products p
                INNER JOIN category c ON p.category_id = c.id
                INNER JOIN image i ON p.image_id = i.id 
                WHERE p.type_feature = 'NEW ARRIVALS' and c.category_name = 'cloth' ";

                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["product_name"];
                        $price = $row["price"];
                        $category = $row["category_name"];
                        $image = $row["product_image"];
                        $product_id = $row["id"];
            
                        echo "<li class='splide__slide'>
                        <div class='col-4 '>    
                            <a href='product_detail.php?id=$product_id'>
                                <div class='card p-2' style= 'width: 300px;margin-left:50px'>
                                        <img src='$image' alt='BK'>
                                        <div class='description'>
                                        <h4 style='font-family: TeXGyreAdventor, serif; font-size: 20px;'>$name</h4>
                                        <h3 class='text-danger' style='font-family: TeXGyreAdventor, serif; font-size: 20px;'>$ $price</h3>
                                        <h5 class='text-black-50' style='font-family: TeXGyreAdventor, serif; font-size: 20px;'>$category</h5>
                                        </div>
                                </div></a>
                        </div>
                        </li>";
                        
                    }
                }
                ?>

        </div>

        </section>
        </div>
    </section>
</div>



<!-- Include Splide.js script -->
<script src="path/to/splide.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('#splide-slider', {
            type: 'loop',
            height: '100%',
            perPage: 4,
            autoplay: true,
            interval: 6000,
            breakpoints: {
                640: {
                    height: '2rem',
                },
            },
        }).mount();
    });
</script>
<div class="t">
    <h3 STYLE="font-family: TeXGyreAdventor, serif; text-align: center; color: white; position: absolute; margin-top: 9px;margin-left: 30px">BEST SELLER </h3>
</div>

<div class="product_slide">
    <section id="splide-slider2" class="splide" aria-label="Slide Container Example">
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                # Connect with mysqli
                $sql = "SELECT p.product_name, i.product_image, p.category_id, p.price, c.category_name, p.type_feature, p.id
                FROM products p
                INNER JOIN category c ON p.category_id = c.id
                INNER JOIN image i ON p.image_id = i.id 
                WHERE p.type_feature = 'BEST SELLER' and c.category_name = 'cloth ' 
                ";

                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["product_name"];
                        $price = $row["price"];
                        $category = $row["category_name"];
                        $image = $row["product_image"];
                        $product_id = $row["id"];
            
                        echo "<li class='splide__slide'>
                        <div class='col-4 '>    
                            <a href='product_detail.php?id=$product_id'>
                                <div class='card p-2' style= 'width: 300px ; margin-left:50px'>
                                        <img src='$image' alt='BK'>
                                        <div class='description'>
                                        <h4 style='font-family: TeXGyreAdventor, serif; font-size: 20px;'>$name</h4>
                                        <h3 class='text-danger' style='font-family: TeXGyreAdventor, serif; font-size: 20px;'>$ $price</h3>
                                        <h5 class='text-black-50' style='font-family: TeXGyreAdventor, serif; font-size: 20px;'>$category</h5>
                                        </div>
                                </div></a>
                        </div>
                        </li>";
                    }
                }
                ?>

            </ul>
        </div>
    </section>

    <!-- Include Splide.js script -->
    <script src="path/to/splide.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Splide('#splide-slider2', {
                type: 'loop',
                height: '100%',
                perPage: 4,
                autoplay: true, // Set autoplay to true
                interval: 6000, // Adjust autoplay interval as needed (in milliseconds)
                // pauseOnHover: false, // Optional: Disable pausing on hover
                breakpoints: {
                    640: {
                        height: '2rem',
                    },
                },
            }).mount();
        });
    </script>

</div>

<div class="container-xxl   allp" style="margin-top: 50px">
    <div col-3 class="poster">
        <img src="Wallpaer/p1.png"style="border-radius: 10px; ">
        <h3 style="font-family: TeXGyreAdventor, serif">2000'S RUNNING</h3>
        <p style="font-family: TeXGyreAdventor, serif; color: grey; font-size: 13px;" >Iconic running silhouettes, reborn for today.</p>
        <a href="your_link_here" style="text-decoration: none;">
            <button type="button" class="btn btn-primary" style="border-radius: 0px; background-color: rgba(217, 217, 217, 1); border: none; color: #020202; font-family: TeXGyreAdventor, serif">SHOP NOW</button>
        </a>

    </div>
    <div col-3 class="poster">
        <img src="Wallpaer/p2.png "style=" width: 290px;height: 379px; border-radius: 10px">
        <h3 style="font-family: TeXGyreAdventor, serif">STAY COOL RIZZ</h3>
        <p style="font-family: TeXGyreAdventor, serif; color: grey; font-size: 13px;" >Want  her take rizz the veres.</p>
        <a href="your_link_here" style="text-decoration: none;">
            <button type="button" class="btn btn-primary" style="border-radius: 0px; background-color: rgba(217, 217, 217, 1); border: none; color: #020202; font-family: TeXGyreAdventor, serif">SHOP NOW</button>
        </a>

    </div>
    <div col-3 class="poster">
        <img src="Wallpaer/p3.png " style="width: 290px;height: 379px; border-radius: 10px">
        <h3 style="font-family: TeXGyreAdventor, serif">ICONIC FELL</h3>
        <p style="font-family: TeXGyreAdventor, serif; color: grey; font-size: 13px;" >Crafted for goals.</p>
        <a href="your_link_here" style="text-decoration: none;">
            <button type="button" class="btn btn-primary" style="border-radius: 0px; background-color: rgba(217, 217, 217, 1); border: none; color: #020202; font-family: TeXGyreAdventor, serif">SHOP NOW</button>
        </a>

    </div>
    <div col-3 class="poster">
        <img src="Wallpaer/p4.png" style="border-radius: 10px">
        <h3 style="font-family: TeXGyreAdventor, serif">FEEL STABLE THROUGH </h3>
        <p style="font-family: TeXGyreAdventor, serif; color: grey; font-size: 13px;" >The ultimate strength training shoes.</p>
        <a href="your_link_here" style="text-decoration: none;">
            <button type="button" class="btn btn-primary" style="border-radius: 0px; background-color: rgba(217, 217, 217, 1); border: none; color: #020202; font-family: TeXGyreAdventor, serif">SHOP NOW</button>
        </a>

    </div>
</div>

<div class="txt">
    <div style="display: flex; justify-content: space-between">
        <div class="pp1">
            <h2 style="font-family: TeXGyreAdventor, serif">Stories, style, and sporting goods at adidas, since 1949</h2>
            <p class="mt-5" style="font-family: TeXGyreAdventor-r, serif; font-size: 15px;letter-spacing: 2px;">
                Through sports, we have the power to change lives. Sports keep us fit. They keep us mindful. They bring us together. Athletes inspire us. They help us to get up and get moving. And sporting goods featuring the latest technologies help us beat our personal best. adidas is home to the runner, the basketball player, the soccer kid, the fitness enthusiast, the yogi. And even the weekend hiker looking to escape the city. The 3-Stripes are everywhere and anywhere. In sports. In music. On life’s stages. Before the whistle blows, during the race, and at the finish line. We’re here to support creators. To improve their game. To live their lives. And to change the world.
                <br><br><br>
                Adidas is about more than sportswear and workout clothes. We partner with the best in the industry to co-create. This way we offer our fans the sporting goods, style and clothing that match the athletic needs, while keeping sustainability in mind. We’re here to support creators. Improve their game. Create change. And we think about the impact we have on our world.
            </p>
        </div>
        <div class="pp2">
            <h2 style="font-family: TeXGyreAdventor, serif">Workout clothes, for any sport</h2>
            <p class="mt-5" style="font-family: TeXGyreAdventor-r, serif; font-size: 15px;letter-spacing: 2px; padding-right: 5px">
                Adidas designs for athletes of all kinds. Creators who love to change the game. People who challenge conventions, break the rules, and define new ones. Then break them all over again. We design sports apparel that gets you moving, winning, and living life to the fullest. We create bras and tights for female athletes who play just as hard as the men. From low to high support. Maximum comfort. We design, innovate and iterate. We test new technologies in action. On the field, the track, the court, and in the pool.
                <br><br><br>
                Through our collections we blur the borders between high fashion and high performance. Like our adidas by Stella McCartney athletic clothing collection – designed to look the part inside and outside of the gym. Or some of our adidas Originals lifestyle pieces, that can be worn as sports apparel too. Our lives are constantly changing. Becoming more and more versatile. And adidas designs with that in mind.
            </p>
        </div>
    </div>

</div>

<div class=" dis ">
    <div class="ttext">

        <p style="font-family: TeXGyreAdventor,serif; font-size: 50px">SIGN UP TO DREAM & GET 15% OFF</p>

    </div>

    <a href="#" style="text-decoration: none;">
        <button type="button" class="btn btn-primary" style="border-radius: 0px; background-color: rgb(2,2,2); border: none; color: #ffffff; font-family: TeXGyreAdventor, serif; margin-top: 40px;font-size: 45px;margin-left: 1150px">SIGN UP FOR FREE<i style="margin-left: 20px" class="fa-solid fa-arrow-right"></i></button>
    </a>

</div>

<!--//footer-->
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
                <!-- Element 1 -->
                <div class="element"><img src="lOGO/nike_w.png" alt="thy" height="80px"></div>
            </div>
            <div class="col-sm-4 ">
                <!-- Element 2 -->
                <div class="element"><img src="lOGO/j_w.png" alt="thy" height="80px"></div>
            </div>
            <div class="col-sm-4">
                <!-- Element 3 -->
                <div class="element"><img src="lOGO/puma_w.png" alt="thy" height="80px"></div>
            </div>
        </div>
        <!-- Second Row -->
        <div class="row">
            <div class="col-sm-4 mt-4 ">
                <!-- Element 4 -->
                <div class="element"><img src="lOGO/addas_w.png" alt="thy" height="55px" style="margin-left: 25px"></div>
            </div>
            <div class="col-sm-4 mt-4">
                <!-- Element 5 -->
                <div class="element"><img src="lOGO/jardan_w.png" alt="thy" height="57"></div>
            </div>
            <div class="col-sm-4 mt-2">
                <!-- Element 6 -->
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


<?php
include("connection.php");
?>
<!doctype html>
<html lang="en" xmlns="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/path/to/fontawesome/all.css"/>
    <script src="menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://kit.fontawesome.com/04762201f9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="team.css">
    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>
<body>


   <!-- <div class="icon col-2 d-flex justify-content-around">-->
<!--        <a href="#"><i class="fas fa-user"></i></a>-->
<!--        <a href="#"><i class="fas fa-shopping-cart"></i></a> -->
<!--    </div>-->



<!-- menu-->
<div class="upmenu">
    <p style="padding-top: 10px; ">FREE SHIPPING ON ORDERS OVER $60 LEARN MORE</p>



</div>
<div>
    <a href="Add_to_cart.php" style="position: absolute; margin-left:1765px;z-index: 9999999; margin-top: -28px ">
        <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a>

    <a href="login.php" style="position: absolute; margin-left:1730px;z-index: 9999999; margin-top: -28px ">
        <i class="fa-solid fa-user" style="color: #ffffff;"></i></a>
</div>
<div class="contain">
    <div class="col-2 brand">
        <a href="Homepage.php"> <img src="LOGO/logod.png" alt="" height="130px;"style="margin-top: -26px"></a>
    </div>
    <div class="col-8 menu">
        <nav>

            <ul class="c ul-reset">
                <li><a href='Homepage.php'>HOME</a></li>
                <li class='droppable'>
                    <a href='#'>SNEAKER</a>
                    <div class='mega-menu'>
                        <div class="cf">
                            <ul class="ul-reset2 ">
                                <li>
                                    <h4>TOP BRAND</h4>
                                </li>
                                <li>
                                    <div class="mu">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 biglogo">
                                                <a href="jordan.php"><img src="image/1.png" alt="pic 1" style="width:60px; height:60px;"/></a>
                                                <p class="logo-name" style="font-size: 12px; padding-left: 8px;">Jordan</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-4 biglogo">
                                                <a href="adidas.php"><img src="image/2.png" alt="pic 2" style="width:80px; height:60px;"/></a>
                                                <p class="logo-name" style="font-size: 12px; padding-left: 15px">Adidas</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-4 biglogo">
                                                <a href="nike.php"><img src="image/3.png" alt="pic 3" style="width:80px; height:60px;"/></a>
                                                <p class="logo-name" style="font-size: 12px;padding-left: 15px">Nike</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-4 biglogo">
                                                <a href="#"><img src="image/4.png" alt="pic 4" style="width:100px; height:60px;"/></a>
                                                <p class="logo-name" style="font-size: 12px; padding-left: 15px;">New Balance</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 biglogo">
                                                <a href="#"><img src="image/5.png" alt="pic 1" style="width:70px; height:60px;"/></a>
                                                <p class="logo-name" style="font-size: 12px;padding-left: 22px">360</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-4 biglogo">
                                                <a href="#"><img  src="image/6.png" alt="pic 2" style="width:75px; height:60px;"/></a>
                                                <p class="logo-name" style="font-size: 12px;padding-left: 22px">Vans</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-4 biglogo">
                                                <a href="#"><img src="image/lv.png" alt="pic 3" style="width:60px; height:60px;"/></a>
                                                <p class="logo-name" style="font-size: 12px;padding-left: -10px">Louis Vuitton</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-4  biglogo">
                                                <a href="#"><img src="image/guici.png" alt="pic 4" style="width:60px; height:60px;"/></a>
                                                <p class="logo-name" style="font-size: 12px;padding-left: 10px">Gucci</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 biglogo">
                                                <a href="#"><img src="image/clnale.png" alt="pic 1" style="width:80px; height:60px;"/></a>
                                                <p class="logo-name" style="font-size: 12px;padding-left: 18px">Chanel</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-4 biglogo">
                                                <a href="#"><img src="image/vasace.png" alt="pic 2" style="width:50px; height:60px;"/></a>
                                                <p class="logo-name" style="font-size: 12px;">Versace</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-4 biglogo" >
                                                <a href="#"><img src="image/puma.png" alt="pic 3" style="width:75px; height:55px;"/></a>
                                                <p class="logo-name" style="font-size: 12px;padding-left: 12px">Puma</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-4 biglogo">
                                                <a href="#"><img src="image/godit.png" alt="pic 4" style="width:75px; height:55px;"/></a>
                                                <p class="logo-name" style="font-size: 12px;padding-left: 16px">God IT</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!--                        <li style="display: flex; margin-left: 650px">-->
                                <!--                            <div style="width: 100px;border: solid red"><h4>FEATURED BRANDS</h4></div>-->
                                <!---->
                                <!--                        </li>-->
                                <div class="col-7" style="margin-left: 530px">
                                    <div class="row row_img">
                                        <?php
                                        global $con;
                                        include "connection.php";
                                        $sql1 = "SELECT p.product_name, i.product_image, p.price,c.category_name
                                FROM products p
                                JOIN image i ON p.image_id = i.id
                                JOIN category c ON p.category_id = c.id
                                WHERE c.category_name = 'sneaker'
                                LIMIT 2";
                                        $result = mysqli_query($con, $sql1);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <div class="col-4 " style="margin-right: 70px">
                                                    <a href="your_link_here">
                                                        <img src="<?php echo $row['product_image']; ?>" alt="" height="180px">
                                                    </a>
                                                    <p style="font-family: TeXGyreAdventor, serif; padding-left: 50px; font-size: 20px; width: 300px"><?php echo $row['product_name']; ?></p>
                                                    <p style="font-family: TeXGyreAdventor, serif; padding-left: 50px; font-size: 15px; color: grey;"><?php echo $row['category_name']; ?></p>
                                                    <p style="font-family: TeXGyreAdventor, serif; padding-left: 50px; font-size: 15px; color: red;"><?php echo "$" . $row['price']; ?></p>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                            </ul>
                        </div><!-- .container -->
                    </div><!-- .mega-menu -->
                </li><!-- .droppable -->
                <li class='droppable'>
                    <a href='cloth.php' class="text-dark">CLOTHES</a>
                    <div class='mega-menu'>
                        <div class="dropdown_cloth">
                            <div class="row">
                                <div class="col-5">
                                    <div class="row logo_1">
                                        <div class="col-3">
                                            <a href="ppc.php"><img src="lOGO/Phnom_Penh_Crown_FC_Logo.png" alt="" height="60px"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="bkfc.php"><img src="lOGO/Boeung_Ket_Angkor.png" alt="" height="60px"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="vsk.php"><img src="lOGO/Visakha_2021.png" alt="" height="60px"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="prfc.php"><img src="lOGO/Svay_Rieng_FC_logo.png" alt="" height="60px"></a>
                                        </div>
                                    </div>

                                    <div class="row logo_1">
                                        <div class="col-3">
                                            <a href="nagaFC.php"><img src="lOGO/Nagaworld_FC_logo.png" alt="" height="60px"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="isi.php"><img src="lOGO/ISI_Dangkor_Senchey_FA-ORIGINAL.png" alt="" height="60px"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="pvfc.php"><img src="lOGO/PrevengFC.png" alt="" height="60px"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="tigerfc.php"><img src="lOGO/TigerFC.png" alt="" height="60px"></a>
                                        </div>
                                    </div>

                                    <div class="row logo_1">
                                        <div class="col-3">
                                            <a href="kirivongfc.php"><img src="lOGO/Kirivong_Sok_Sen_Chey_FC_Crest.png" alt="" height="60px"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="tiffyArmy.php"><img src="lOGO/TiffyArmy.png" alt="" height="60px"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="addidas.php"><img src="lOGO/Adidas_logo.png" alt="" height="50px"></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="nike.php"><img src="lOGO/nike.png" alt="" height="50px"></a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-7">

                                    <div class="row row_img">
                                        <div class="col-6">
                                            <img src="Jersey/ppc.jpg" alt="" height="300px">
                                        </div>
                                        <div class="col-6">
                                            <img src="Jersey/vsk.jpg" alt="" height="300px">
                                        </div>
                                        <!-- <div class="col-4">
                                            <img src="Jersey/bk.jpg" alt="" height="200px">
                                        </div> -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a class="text-dark" href="About_us.php">ABOUT US</a></li>
            </ul>

        </nav>
    </div>
    <div class="col-2 search">
        <div class="search_box">

            <form id="searchForm" action="search_results.php" method="post" style="display: flex">
                <input id="searchInput" type="text" name="search_text" style="border: none;" placeholder="Search">
                <button type="submit" style="border: none; margin-left: 20px; background-color: #edebeb "><i class='bx bx-search-alt-2'></i></button>
            </form>
        </div>
        <div class="display_search" id="searchResults"></div>
    </div>

    <!--    <div class="col-2 search">-->
    <!--        <div class="search_box">-->
    <!--            <i class='bx bx-search-alt-2'></i>-->
    <!--            <input id="searchInput" type="text" style="border: none;" placeholder="Search">-->
    <!--        </div>-->
    <!--        <div class="display_search" id="searchResults"></div>-->
    <!--    </div>-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('searchInput');
            var searchResults = document.getElementById('searchResults');
            searchInput.addEventListener('input', function() {
                var searchText = this.value;
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'search.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        searchResults.innerHTML = xhr.responseText;
                        if (searchText.trim() !== '') {
                            searchResults.classList.add('active');
                        } else {
                            searchResults.classList.remove('active');
                        }
                    }
                };
                xhr.send('search_text=' + searchText);
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var searchInput = document.getElementById('searchInput');
            var searchResults = document.getElementById('searchResults');
            searchInput.addEventListener('input', function () {
                if (searchInput.value.trim() !== '') {
                    searchResults.classList.add('active');
                } else {
                    searchResults.classList.remove('active');
                }
            });
        });

    </script>
</div>

</body>
</html>
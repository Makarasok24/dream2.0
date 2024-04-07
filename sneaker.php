<?php
     include("connection.php");
     include("menu.php"); 
    //  $brand_name = $_GET['brandName'];
?>
    
  <link rel="stylesheet" href="sneaker.css">
  <link rel="stylesheet" href="brand_display.css">
  <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <!-- Link to the file hosted on your server, -->
    <link rel="stylesheet" href="path-to-the-file/splide.min.css">
    <!-- or link to the CDN -->
    <link rel="stylesheet" href="url-to-cdn/splide.min.css">
    

<title> Sneaker </title>
        <?php
            echo'<div>
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
            </div>';
            ?>
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
    <div class="sneaker">
        <div class="intro">
            <h3>SHOP ALL NOW</h3>
        </div>
        <div class="limited">
        <<p>Limited Editions</p>
        </div>
       
        <div class="item-limited">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 left">
                <div>
                    <div class="single-item">
                            <?php
                            
                            $sql = "SELECT * FROM brand,image,products WHERE products.type_feature = 'LIMITED EDITION(BA)' AND products.category_id = 2 AND products.image_id = image.id";
                            $data = $con->query($sql);
                            if($data->num_rows>0){
                                $row = $data->fetch_assoc();
                                while($row){
                                    $pro_id = $row['id'];
                                    $img = $row['product_image'];
                                    $name = $row['product_name'];
                                    $price = $row['price'];
                                    // $brand = $row['brand'];
                                    $row = $data->fetch_assoc();
                                    
                                    echo '     
                                        <a href="product_detail.php?id='.$pro_id.'" class="du-lin">
                                            <div class="du">
                                                <div>
                                                     <img src= '.$img.' class = "col-lg-12 col-md-6 col-xs-6 com-sm-6 " height="250px" >
                                                </div>
                                                <div class="out-talk col-lg-12 col-md-6 col-xs-6 com-sm-6 ">
                                                    <div class="talk">
                                                        <p class="description">Name:'.$name.'</p>
                                                        <p class="brand">Brand:'.$name.'</p>
                                                        <p class="price_sell">$ '.$price.'</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a> ';
                                        

                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
             
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 right">
                <div class="top">
                    <div class="quote">
                        <marquee behavior="scroll" direction="left"><p>BY NOW! WHAT ARE YOU WAITING FOR?</p></marquee>
                    </div>
                </div>
                <div class="bottom">
                    <div>
                        <div class="responsive">
                            
                            <?php
                                $sql = "SELECT * FROM brand,image,products WHERE products.type_feature = 'LIMITED EDITION' AND products.category_id = 2 AND products.image_id = image.id ";
                                $data = $con->query($sql);
                                if($data->num_rows>0){
                                    $row = $data->fetch_assoc();
                                    while($row){
                                        $pro_id = $row['id'];
                                        $name = $row['product_name'];
                                        $price = $row['price'];
                                        $brand = $row['brand'];
                                        $img = $row['product_image'];
                                        $row = $data->fetch_assoc();
                                        echo'<a href="product_detail.php?id='.$pro_id.'" class = "duct-link">
                                                <div class = "duct">
                                                        <div class="img-l">
                                                            <img src='.$img.' height="150px"; width="150px">
                                                        </div>
                                                        <div class="out-talk">
                                                            <div class="talk">
                                                                <p class="name">'.$name.'</p>
                                                                <p class="brand">'.$brand.'</p>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class = "box-price">
                                                                <p class="price_sell">'.$price.'$</p>
                                                        </div>
                                                </div>
                                            </a>';
                                    }
                                }
                        $sqlCount = "SELECT * FROM products WHERE category_id = 2";
                        $data1= $con->query($sqlCount);
                         $count = $data1->num_rows;
                        
                            ?>
                        </div>
                    </div> 
                    
                    <script type="text/javascript">
                        $(document).ready(function(){
                        
                            $('.single-item').slick({
                                dots: false,
                                infinite: false,
                
                                autoplay: true,
                                autoplaySpeed: 2000,
                            });
                            $('.responsive').slick({
                            dots: false,
                            infinite: false,
                            speed: 300,
                            slidesToShow: 4,
                            slidesToScroll: <?php echo $count + 15 ?>,
                            autoplay: true,
                            autoplaySpeed: 2000,
                            responsive: [
                                {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: <?php echo $count + 30 ?>,
                                    infinite: true,
                                    dots: false,
                                    autoplay: true,
                                    autoplaySpeed: 2000
                                }
                                },
                                {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: <?php echo $count + 3 ?>,
                                    autoplay: true,
                                    autoplaySpeed: 2000
                                }
                                },
                                {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: <?php echo $count -4 ?>,
                                    autoplay: true,
                                    autoplaySpeed: 2000
                                }
                                }
                                // You can unslick at a given breakpoint now by adding:
                                //settings: "unslick";
                                // instead of a settings object
                            ]
                                });
                          
                        });
                    </script>
                       <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
                    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                    <script type="text/javascript" src="slick/slick.min.js"></script>
                </div>
            </div>
        </div>
        
        <div class="popular">
            <p>Popular</p>
        </div>
        <div class="sneak-slide popular-sneak">
                        <div class="responsive v">
                            <?php
                                $sql = "SELECT * FROM image,products 
                                WHERE products.type_feature = 'POPULAR' 
                                AND products.category_id = 2 
                                AND products.image_id = image.id";
                                $data = $con->query($sql);
                                if($data->num_rows>0){
                                    $row = $data->fetch_assoc();
                                    while($row){
                                        $name = $row['product_name'];
                                        $price = $row['price'];
                                        $brand = $row['brand'];
                                        $img = $row['product_image'];
                                        $prod_id = $row['id'];
                                        $row = $data->fetch_assoc();
                                        
                                        echo'<div class="item-popular">
                                        <a href="product_detail.php?id='.$prod_id.'"><div class="img-l"><img src='.$img.' height="150px"; width = "150px";></div>
                                                <div class="out-talk">
                                                    <div class="talk">
                                                        <p class="description">'.$name.'</p>
                                                        <p class="brand">'.$brand.'</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class = "box-price">
                                                    <p class="price_sell">'.$price.'$</p>
                                                </div>
                                            </div></a>';
                                    }
                                }
                            ?>
                        </div>
                    </div> 
    </div>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
</body>
</html>
<?php
include "menu.php";
?>
<!doctype html>
<html lang="en" xmlns="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="image/1.png"/>
    <title>Jordan</title>
    <link rel="stylesheet" href="aboutus.css">
    <link rel="stylesheet" href="ab.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/path/to/fontawesome/all.css" />
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/04762201f9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="path-to-the-file/splide.min.css">
    <link rel="stylesheet" href="url-to-cdn/splide.min.css">
</head>
<body>

<div class=" container-fluid  all">
    <div class="carddis">
        <div class="card" style="width: 62rem; display: none;" id="card1">
            <img src="profile/2.png" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">EcoCare is your go-to hub for eco-friendly living tips, sustainable practices, and green innovations. Explore ways to reduce your carbon footprint and live in harmony with nature.</p>
            </div>
        </div>

        <div class="card" style="width: 62rem; display: none;" id="card2">
            <img src="profile/3.png" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">FitFamApp is your personal fitness companion, offering workout routines, nutrition advice, and a supportive community to help you achieve your health goals. Join us and stay motivated on your fitness journey!</p>
            </div>
        </div>

        <div class="card" style="width: 62rem; display: none;" id="card3">
            <img src="profile/t.png" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">FoodieDelight is a paradise for culinary enthusiasts, featuring mouthwatering recipes, cooking hacks, and restaurant reviews. Discover new flavors, sharpen your cooking skills, and indulge in gastronomic delights.</p>
            </div>
        </div>

        <div class="card" style="width: 62rem; display: none;" id="card4">
            <img src="profile/4.png" class="card-img-top" alt="..." >
            <div class="card-body">
                <p class="card-text">SPetPalsCommunity is where pet lovers unite! Find expert pet care tips, adorable animal videos, and connect with fellow pet enthusiasts. Whether you're a proud pet parent or simply adore furry friends, this is your online haven.</p>
            </div>
        </div>

        <div class="card" style="width: 62rem; display: none;" id="card5">
            <img src="profile/5.png" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">TravelBugAdventures invites you to explore the world and embark on unforgettable journeys. Discover travel guides, insider tips, and captivating stories from globetrotters around the globe. Let your wanderlust take flight with us!.</p>
            </div>
        </div>

    </div>

    <div class="buun mt-1">
        <button class="b1 button-92" role="button" onclick="showCard('card1')"> Morm Lyda</button>
        <button class="b button-92" role="button" onclick="showCard('card2')"> Math Ehak</button>
        <button class="b button-92" role="button" onclick="showCard('card3')">Sok Sothy</button>
        <button class="b button-92" role="button" onclick="showCard('card4')">Sok Chenda</button>
        <button class="b button-92" role="button" onclick="showCard('card5')">Sok Makara</button>
    </div>
</div>


<script>
    // Function to show the specified card and hide others
    function showCard(cardId) {
        var cards = document.getElementsByClassName('card');
        for (var i = 0; i < cards.length; i++) {
            if (cards[i].id === cardId) {
                cards[i].style.display = 'block';
            } else {
                cards[i].style.display = 'none';
            }
        }
    }
</script>
<?php
include "footer.php";
?>
</body>
</html>

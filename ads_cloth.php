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
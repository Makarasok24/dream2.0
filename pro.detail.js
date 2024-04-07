function changeImage(element) {
    var mainImage = document.getElementById("main-image");
    mainImage.src = element.src;
    var galleryImages = document.getElementsByClassName("gallery")[0].children;
    for (var i = 0; i < galleryImages.length; i++) {
      galleryImages[i].classList.remove("active");
    }
    element.classList.add("active");
    
  }
  
var currentIndex = 0;
var galleryImages = document.querySelectorAll('.gallery img');
var totalImages = galleryImages.length;
function nextImage() {
    currentIndex = (currentIndex + 1) % totalImages;
    var nextImage = galleryImages[currentIndex];
    changeImage(nextImage);
}
  
function prevImage() {
    currentIndex = (currentIndex - 1 + totalImages) % totalImages;
    var prevImage = galleryImages[currentIndex];
    changeImage(prevImage);
}
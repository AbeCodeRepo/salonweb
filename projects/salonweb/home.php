<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Salon web site">
   <meta name="keywords" content="salon web site, salon in sri lanka">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/user_style.css">

   <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
   
<?php include 'header.php'; ?>
<div class="back_2">

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="Images/s1.jpg" style="width:100%">
  <div class="glow" style= "font-size:6vw" >Your hair deserve <br> the best.</div>
  
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="Images/2nd slide.jpg" style="width:100%">
  <div class="glow" style="font-size:6vw;">Your hair is our <br> craft.</div>
 
 
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="Images/3rd slide.jpg" style="width:100%">
  <div class="glow" style="font-size:6vw; ">Let your hair <br> do the talking.</div>

 
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>
</div>
<br>
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
<br>
</div>


<section class="home">

   <div class="content">
      <h3>Talent Senanayake Salon</h3>
      <p>Reserve a time for your hair style.</p>
      <a href="appointment.php" class="white-btn">Book Appointment</a>
   </div>
   </section>







<div style="margin:top 0px; padding:1px 1px 10px; background-color: #FFCD13;"></div>

<?php include 'footer.php'; ?>

<script>
 let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}


</script>




<!-- custom js file link  -->
<script src="js/user_script.js"></script>

</body>
</html>
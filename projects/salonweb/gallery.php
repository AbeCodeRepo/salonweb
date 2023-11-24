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
   <title>gallery</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/user_style.css">

</head>
<body>
   
<?php include 'header.php'; ?>
<div class="back_2">
<div class="heading">
   <h3>Gallery</h3>
  
</div>

<br>
<br>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="Images/1st slide.jpg" style="width:100%">
  <div class="glow" style= "font-size:6vw" >Your hair deserve <br> the best.</div>
  
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="Images/2nd slide.jpg" style="width:100%">
  <div class="glow" style="font-size:6vw;">Your hair is <br> our craft.</div>
 
 
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




<br>
<br>
<section class="gallery">



   <div class="box-container">

      <?php  
         $select_gallery = mysqli_query($conn, "SELECT * FROM `gallery`") or die('query failed');
         if(mysqli_num_rows($select_gallery) > 0){
            while($fetch_gallery = mysqli_fetch_assoc($select_gallery)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_gallery['image']; ?>" alt="">
      <input type="hidden" name="gallery_image" value="<?php echo $fetch_gallery['image']; ?>">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no pictures added yet!</p>';
      }
      ?>
   </div>
   <br>
<br>
<br>

   </div>

</section>






   </div>
   <div style="margin:top 0px; padding:1px 1px 10px; background-color: #FFCD13;"></div>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->




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

<script src="js/user_script.js"></script>

</body>
</html>
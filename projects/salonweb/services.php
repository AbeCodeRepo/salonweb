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
   <title>services</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/user_style.css">

</head>
<body>
   
<?php include 'header.php'; ?>
<div class="back_2">
<div class="heading">
   <h3>Services</h3>
  
</div>
<br>
<br>
<section class="services">



   <div class="box-container">

      <?php  
         $select_services = mysqli_query($conn, "SELECT * FROM `services`") or die('query failed');
         if(mysqli_num_rows($select_services) > 0){
            while($fetch_services = mysqli_fetch_assoc($select_services)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_services['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_services['name']; ?></div>
      <div class="price">Rs.<?php echo $fetch_services['price']; ?>/-</div>
      <input type="hidden" name="service_name" value="<?php echo $fetch_services['name']; ?>">
      <input type="hidden" name="service_price" value="<?php echo $fetch_services['price']; ?>">
      <input type="hidden" name="service_image" value="<?php echo $fetch_services['image']; ?>">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no services added yet!</p>';
      }
      ?>
   </div>

</section>


<br>
<br>




   </div>
   <div style="margin:top 0px; padding:1px 1px 10px; background-color: #FFCD13;"></div>
<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/user_script.js"></script>

</body>
</html>
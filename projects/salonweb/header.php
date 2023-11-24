<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fa fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="flex">

      <a href="home.php" class="logo">Talent Senanayake Salon</a>

      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="services.php">Services</a>
         <a href="gallery.php">Gallery</a>
        
         <a href="contact.php">Contact</a>
         <a href="appointment.php">Appointment</a>
         <a href="about_us.php">About Us</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fa fa-bars"></div>
         <div id="user-btn" class="fa fa-user"></div>  
      </div>

      <div class="user-box">
         <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div>new <a href="login.php">login</a> | <a href="register.php">register</a></div>
      </div>

   </div>

</header>
<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/user_style.css">

</head>
<body>
   
<?php include 'header.php'; ?>
<div class="back_2">
<div class="heading">
   <h3>about us</h3>
   
</div>
<br>
<div class="about-detail">
                <div class="about-detail-content">
                    <div class="about-img">
                        <img src="images/about_img.jpg">
                    </div>
                    <div class="about-description">
                        <p>Talent Senanayake Salon was started before 15 years. </p>
                        <p>In 23rd of January 2022 we were moved to a new places in Meewellewa area. </p>
                        <p>We are the most famous salon in our area. </p>
                        <a href="contact.php" class="btn">contact us</a>
                    </div>
                </div>
            </div>





<br>
<br>
<br>

</div>
<div style="margin:top 0px; padding:1px 1px 10px; background-color: #FFCD13;"></div>


<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/user_script.js"></script>

</body>
</html>
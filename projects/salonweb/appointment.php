<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send_a'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $date = $_POST['date'];
   $time = $_POST['time'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `appointment` WHERE name = '$name' AND email = '$email' AND number = '$number'  AND date = '$date' AND time = '$time' AND message = '$msg'  ") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'Appointment has sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `appointment`(user_id, name, email, number, date, time, message) VALUES('$user_id', '$name', '$email', '$number', '$date', '$time', '$msg')") or die('query failed');
      $message[] = 'Appointment has sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>appointment</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/user_style.css">

</head>
<body>
   
<?php include 'header.php'; ?>
<div class="back_2">
<div class="heading">
   <h3>Book Appointment</h3>
   
</div>
<br>

<div class="form-container">
   <div><p class="big_front" style="font-size:5vw;">Reserve <br> a time <br>for your<br> hair style.</p></div>

   <form action="" method="post">
      
      <input type="text" name="name" required placeholder="enter your name" class="box">
      <input type="email" name="email" required placeholder="enter your email" class="box">
      <input type="number" name="number" required placeholder="enter your number" class="box">
      <input type="date" name="date"  class="box">
      <input type="time" name="time"  class="box">
      <textarea name="message" class="box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="Book Appointment" name="send_a" class="btn">
   </form>
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
<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_gallery'])){
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

 
      $add_gallery_query = mysqli_query($conn, "INSERT INTO `gallery`(image) VALUES('$image')") or die('query failed');

      if($add_gallery_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'picture added successfully!';
         }
      }else{
         $message[] = 'picture could not be added!';
      }
   }

   if(isset($_GET['delete'])){
      $delete_id = $_GET['delete'];
      $delete_image_query = mysqli_query($conn, "SELECT image FROM `gallery` WHERE id = '$delete_id'") or die('query failed');
      $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
      unlink('uploaded_img/'.$fetch_delete_image['image']);
      mysqli_query($conn, "DELETE FROM `gallery` WHERE id = '$delete_id'") or die('query failed');
      header('location:admin_gallery.php');
   }


if(isset($_POST['update_gallery'])){

   $update_p_id = $_POST['update_p_id'];
   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `gallery` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
      }
   }

   header('location:admin_gallery.php');

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

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
<div class="back_2">
<?php include 'admin_header.php'; ?>




<section class="add-gallery">

   <h1 class="title">gallery</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>add picture</h3>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="add gallery" name="add_gallery" class="btn">
   </form>

</section>



<section class="show-gallery">

   <div class="box-container">

      <?php
         $select_gallery = mysqli_query($conn, "SELECT * FROM `gallery`") or die('query failed');
         if(mysqli_num_rows($select_gallery) > 0){
            while($fetch_gallery = mysqli_fetch_assoc($select_gallery)){
      ?>
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_gallery['image']; ?>" alt="">
         <a href="admin_gallery.php?update=<?php echo $fetch_gallery['id']; ?>" class="option-btn">update</a>
         <a href="admin_galley.php?delete=<?php echo $fetch_gallery['id']; ?>" class="delete-btn" onclick="return confirm('delete this picture?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no pictures added yet!</p>';
      }
      ?>
   </div>

</section>

<section class="edit-gallery-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `gallery` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
      <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update_gallery" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-gallery-form").style.display = "none";</script>';
      }
   ?>

</section>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
   </div>




<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>
<?php
session_start();
    if(isset($_POST['signup'])){
      include('includes/db_conn.php');
      $email =$_POST['email'];
      $password =$_POST['password'];
      $con_password =$_POST['con_password'];
      $error = '';
      $msg = '';

      if($password !==$con_password){
          global $error;
          $error .= "password do not match";
      }

      
      function isValidEmail($email){ 
        global $error;
          $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i"; 
      
          if (!preg_match( $pattern,$email)){
              global $error;
              $error .="Invalid email";
          } 
            
        } 
        
        isValidEmail($email);

        if(strlen($password) <8){
            global $error;
            $error .= "password should be atleast 8 characters";
        } 

      if(empty($error)){

        $check_email = mysqli_query($conn,"SELECT email FROM `users` WHERE `email` = '$email'");
        if (mysqli_num_rows($check_email) > 0) {
            global $error;
            $error .= "Email already exists";
        }

        if(empty($error)){
          $e_password = sha1($conn);
          $insert = mysqli_query($dbconnect,"INSERT INTO `users` (`email`,`password`) VALUES ('$email','$e_password')");
          if($insert){
              global $msg;
              $msg .="Account created";
              $_SESSION['email'] = $email;
              header("location:first.php");
          }else{
              global $error;
              $error .= "Unable to create account";
          }
        }
      }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <title>Log In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </head>
  <body >
    <div class="col-md-4 offset-4 py-5">
    <form class="form-signin" method="post" action="">
    <?php
      if(!empty($error)){?>
        <div class="alert alert-danger alert-dismissible col-md-12">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error!</strong> <?php echo $error ?>
        </div>
    <?php } ?>
    <?php
      if(!empty($msg)){?>
        <div class="alert alert-success alert-dismissible col-md-12">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong> <?php echo $msg ?>
        </div>
    <?php } ?>
      <input type="hidden" name="signup" value="signup" required >
      <img class="mb-4 col-md-6 offset-3" src="img/logo.png" alt="" width="100" height="100">
      <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" required>         
      </div>  
      <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" required>         
      </div>  
      <div class="form-group">
        <label for="">Retype Password</label>
        <input type="password" class="form-control" name="con_password" required>         
      </div>        
      <button class="btn btn-primary float-right" type="submit" >Sign Up</button>      
    </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>

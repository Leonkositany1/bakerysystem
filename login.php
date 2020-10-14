<?php 
session_start();
   if (isset($_POST['email'])) {
    include('includes/db_conn.php');
        $email =mysqli_real_escape_string ($conn,$_POST['email']);
        $password =  $_POST['password'];
       // encrypt with sha1 algorithm
        $encrypted_password = sha1($password);

        $check_email = mysqli_query($conn,"SELECT email FROM `users` WHERE `email` = '$email' AND `password`='$encrypted_password'");
        if (mysqli_num_rows($check_email) == 1) {
            $_SESSION['baker_login'] = $email;
            header('location:index.php');
        }else{
          global $error;
          $error .= "Email and password do not match our database";   
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
   <style>
  body {
    background-image: url("img/bg_bakery.jpg");   
    }
   </style>
  </head>
  <body >
    <div class="col-md-4 offset-4 py-5">
    <form  role="form" class="form-signin" method="post" action="login.php">
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
      <img class="mb-4 col-md-6 offset-3" src="img/logo.png" alt="" width="100" height="100">
      <div class="form-group">
        <label for="" class="text-white">Email</label>
        <input type="email" class="form-control" name="email" id="" required>         
      </div>  
      <div class="form-group">
        <label for="" class="text-white">Password</label>
        <input type="password" class="form-control" name="password" id="" required>         
      </div>      
      <a class="float-left bg-info text-white mx-auto" href="sign_up.php">Create an Account</a>   
      <button class="btn btn-primary float-right" type="submit" name="submit">Sign In</button>      
    </form> 
    </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>

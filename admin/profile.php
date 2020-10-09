<?php 
include("session_check.php");
include("../includes/db_conn.php");

$admin = mysqli_query($conn, "select * from admin");
$admin = mysqli_fetch_assoc($admin);

  if(isset($_POST['submit'])){

    $email =$_POST['email'];
    $uname = $_POST['uname'];
    $password = sha1($_POST['password']);
    $con_password = sha1($_POST['con_password']);
    $error = '';
    $msg = '';

    if(strlen($password) <8){
      $error .= "password should be atleast 8 characters";
    } 


    
    $update_admin = mysqli_query($conn, "UPDATE `admin` SET `uname`='$uname', `email`='$email',`password`='$password'");
    if($update_admin){
      global $msg;
      $msg .= "Credentials updated";
      header("location:profile.php");
    }else{
      global $error;
      $error .= "unable to update credentials. Try again...";
    }
  }

?>
   <?php require('head.php');?>
  <!-- Main content -->
  <div class="main-content py-2" id="panel"> 
    <!-- Page content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form role="form" action="profile.php" method="post">
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
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control" name="uname" placeholder="New Username" value="<?php echo $admin['uname'] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control" name="email" placeholder="jesse@example.com" value="<?php echo $admin['email'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Password</label>
                        <input type="password" id="input-first-name" name="password" class="form-control" placeholder="Enter new password">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Re-Type Password</label>
                        <input type="password" id="input-last-name" name="con_password" class="form-control" placeholder="Confirm your password">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0"></h3>
                    </div>
                    <div class="col-4 text-right">
                      <button type="submit" name="submit" class="btn btn-sm btn-primary">Edit Credentials</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <br>
        </div>
      </footer>
    </div>
  </div>
  <?php require('scripts.php');?>
</body>

</html>
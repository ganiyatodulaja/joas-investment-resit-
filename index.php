<?php
session_start();
ob_start();
include 'assets/db_config/connect.php';
include 'assets/db_config/db_config.php';
$error = '<div class="text-danger"><strong>oops!</strong> Invalid username or password.</div>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>JOAS Investments</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">
<!-- App css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
</head>

<body id="body" class="auth-page" style="background-image: url('assets/images/p-1.png'); background-size: cover; background-position: center center;">
<!-- Log In page -->
<div class="container-md">
  <div class="row vh-100 d-flex justify-content-center">
    <div class="col-12 align-self-center">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-4 mx-auto">
            <div class="card">
              <div class="card-body p-0">
                <div class="text-center p-3"> <a href="#" class="logo logo-admin"> <img src="assets/images/logo-login.png" height="100" alt="logo" class="auth-logo"> </a>
                  <p class="text-muted  mb-0">Sign in to continue to JOAS Investment Portal.</p>
                </div>
              </div>
              <!--end card-body-->
              <div class="card-body pt-0"> <span class="mt-1 d-flex justify-content-center">
                <?php
				error_reporting(0);
                if(isset($_POST['post-data'])) {
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $password = mysqli_real_escape_string($db,$_POST['password']);
  $sql = mysqli_query($db,"SELECT * FROM client WHERE email='$email' AND password='$password'");
  $check = mysqli_num_rows($sql);
  if($check<1){
    $query = mysqli_query($db,"SELECT * FROM admin WHERE email='$email' AND password='$password'");
    $admincheck = mysqli_num_rows($query);
    if($admincheck>0){
      $_SESSION['email'] = $email;
      header('location:dashboard');
    }
    else{
      echo $error;
    }
  }
  else{

    $_SESSION['email'] = $email;
    header('location:clients/dashboard');
  }
} 
                ?>
                </span>
                <form class="my-1" method="post" action="">
                  <div class="form-group mb-2">
                    <label class="form-label" for="username">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                  </div>
                  <!--end form-group-->
                  
                  <div class="form-group">
                    <label class="form-label" for="userpassword">Password</label>
                    <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                  </div>
                  <!--end form-group-->
                  
                  <div class="form-group row mt-3">
                    <div class="col-sm-6">
                      <div class="form-check form-switch form-switch-success">
                        <input class="form-check-input" type="checkbox" id="customSwitchSuccess">
                        <label class="form-check-label" for="customSwitchSuccess">Remember me</label>
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-sm-6 text-end"> <a href="auth-recover-pw.html" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a> </div>
                    <!--end col--> 
                  </div>
                  <!--end form-group-->
                  
                  <div class="form-group mb-0 row">
                    <div class="col-12">
                      <div class="d-grid mt-3">
                        <button class="btn btn-primary" type="submit" name="post-data">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                      </div>
                    </div>
                    <!--end col--> 
                  </div>
                  <!--end form-group-->
                </form>
                <!--end form-->
                <div class="m-3 text-center text-muted">New user?<a href="auth-register"> Signup Here</a></div>
              </div>
              <!--end card-body--> 
            </div>
            <!--end card--> 
          </div>
          <!--end col--> 
        </div>
        <!--end row--> 
      </div>
      <!--end card-body--> 
    </div>
    <!--end col--> 
  </div>
  <!--end row--> 
</div>
<!--end container--> 

<!-- App js --> 
<script src="assets/js/app.js"></script>
</body>
</html>
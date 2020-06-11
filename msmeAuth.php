<?php
  //define the config
  define('__CONFIG__',true);
  //allow the config file
  require_once("include/config.php");
  ForceDashboard();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Assam State Covid19 Management</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/modern-business.css" rel="stylesheet">

</head>

<body>

  <?php require("navbarForPublic.php"); ?>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
      <small>MSME Login | Signup: Login or SignUp to post about your products</small>
    </h1>

    

    <!-- Intro Content -->
    <div class="row">
      
      <div class="col-lg-6">
        <h2>Login</h2>
        <p>
          <form method="POST" class="loginForm">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input name="f_username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="f_password" type="password" class="form-control" id="exampleInputPassword1" >
  </div>
  
  <button type="submit" class="btn btn-dark">Submit</button>
  <div class="errorText"></div>
</form>
        </p>
      </div>
      <div class="col-lg-6">
        <h2>SignUp</h2>
        <p>
          <form method="POST" class="registerForm">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input name="f_username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    
  </div>

  <div class="form-group">
                    <label class="control-label">District*</label>
                    <div class="controls">
                        <select id="district" name="f_district" class="input-xlarge">
                            
<?php require_once("districtList.php");?>

                        </select>
                    </div>
                </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="f_password1" type="password" class="form-control" id="exampleInputPassword1" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input name="f_password2" type="password" class="form-control" id="exampleInputPassword1" >
  </div>
  <button type="submit" class="btn btn-dark">Submit</button>
  <div class="errorText"></div>
</form>
        </p>
      </div>
    </div>
    
    

    

  </div>
  <!-- /.container -->

<?php require_once("footer.php") ?>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/msmeAuthFunctions.js"></script>

</body>

</html>
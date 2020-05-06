<?php
 
  define('__CONFIG__',true);

  require_once("include/config.php");

  
  ForceLogin();


  // echo $_SESSION['user_id'].' is your session id';
  $userId = $_SESSION['user_id'];
  $getUserInfo = $con->prepare("SELECT * FROM users WHERE user_id= :id LIMIT 1");
  $getUserInfo->bindParam(':id',$userId,PDO::PARAM_INT);
  $getUserInfo->execute();
  if($getUserInfo->rowCount()==1){
    $userDetails = $getUserInfo->fetch(PDO::FETCH_ASSOC);

   
  }else{
    header("location:/covid19hackathon/logout.php");exit;
  }

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

 <?php require("navbarForUsers.php")?>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
      <small>Update your profile</small>
    </h1>

    

    <!-- Intro Content -->
    <div class="row">
      
      <div class="col-lg-6">
        <form class="form-horizontal updateProfileForm" action="" method="POST">
      <input type='hidden'  name='f_id' value="<?php echo $userDetails['user_id']?>">
      <div class="form-group">
          <label class="control-label col-sm-2" for="f_fullname">Fullname</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="f_fullname" placeholder="Enter Fullname" name="f_fullname" value="">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="f_phone">Phone Number</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="f_phone" placeholder="Enter phone number" name="f_phone" value="">
          </div>
        </div>

        

        
        
        
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-dark">Submit</button>
          </div>
        </div>
        <div class="errorText"></div>
      </form>
      </div>
      <div class="col-lg-6">
       

        
      </div>
    </div>
    <!-- /.row -->
    
    

    

  </div>
  <!-- /.container -->

   <!-- Footer -->
  <footer class="py-5 bg-light ">
    <div class="container">
      <p class="m-0 text-center text-dark">Copyright &copy; Swapnanil Pathak 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/formfunctions_updateprofile.js"></script>

</body>

</html>
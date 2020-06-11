<?php
 
  define('__CONFIG__',true);

  require_once("include/config.php");

  
  


 $userLoggedIn = 0;
 if(isset($_SESSION['user_id'])){
    $userId = $_SESSION['user_id'];
  $getUserInfo = $con->prepare("SELECT * FROM users WHERE user_id= :id LIMIT 1");
  $getUserInfo->bindParam(':id',$userId,PDO::PARAM_INT);
  $getUserInfo->execute();
  if($getUserInfo->rowCount()==1){
    $userDetails = $getUserInfo->fetch(PDO::FETCH_ASSOC);
    $userLoggedIn=1;
   
  }else{
    $userLoggedIn=0;
  }
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
<?php ($userLoggedIn==0)?require("navbarForPublic.php"):require("navbarForUsers.php"); ?>
  

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Donate</h1>

    
    

    <div class="row">
		<div class="col-lg-6">
			<?php echo($userLoggedIn==0)?"Please login or register to use the sevices":""; ?>
		</div>
		
	</div>

    
    

    <!-- Features Section -->
    <div class="row">
      <div class="col-lg-6 font-weight-bold">
        <h1 class="my-4">List of Accounts For Donation</h1>
        
          <?php
          $query = $con->prepare("SELECT * FROM donationdetails");

              $query->execute();
              while($row = $query->fetch(PDO::FETCH_ASSOC)){
                echo "".$row['title']."<br>Bank Name:".$row['bankaccountname']."<br>Account Number:".$row['bankaccountno']."<br>IFSC Code:".$row['bankifsccode']."<br>Or UPI ID".$row['upiid']."<br>Description".$row['description']."<br><br><br>";
              }
          ?>
       
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="assets/images/rhino2.jpeg" alt="">
      </div>
    </div>
    <!-- /.row -->

    

    

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php require_once("footer.php") ?>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>

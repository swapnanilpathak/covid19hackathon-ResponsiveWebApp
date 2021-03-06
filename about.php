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

    <h1 class="my-4">About Assam State Covid19 Management Portal</h1>

    
    

    <div class="row">
		<div class="col-lg-6">
			<?php echo($userLoggedIn==0)?"Please login or register to use the sevices":""; ?>
		</div>
		
	</div>

    
    

    <!-- Features Section -->
    <div class="row">
      <div class="col-lg-6">
        <h2>Covid 19 management portal</h2>
        <p>Covid 19 management web portal for the state of Assam built for covid19hackathon</p>
        <ul>
          <li>
            <strong>Services</strong>
          </li>
          <a class="dropdown-item" href="foodSupplyForIsolatedPatient.php">Food Supply For Isolated Patient</a>
              <a class="dropdown-item" href="essentialTransportPass.php">Essential Service Transport Pass</a>
              <a class="dropdown-item" href="personalPass.php">Personal Pass</a>
             <a class="dropdown-item" href="volunteerForWork.php">Work As A Volunteer</a>
             <a class="dropdown-item" href="doctorAppointment.php">Online Doctor's Appointment</a>
              <a class="dropdown-item" href="hospitalAdmission.php">Hospital Admission</a>
              <a class="dropdown-item" href="inputPatientSymptomData.php">Input Patient Symptom Data</a>
              <a class="dropdown-item" href="counselling.php">Book A Counselling Session</a>
              <a class="dropdown-item" href="buymsmeproducts.php">Buy MSME Products</a>
               
             <a class="dropdown-item" href="donatereliefmaterials.php">Donate Relief Materials</a>
        </ul>
        
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

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
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('assets/images/pexels-photo-1257644.jpeg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Guwahati City</h3>
            <!--<p></p>-->
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('assets/images/rhino.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>One Horrned Rhino</h3>
            <!--<p></p>-->
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('assets/images/bridge-fog-india-assam-guwahati-brahmaputra-river-infinity-1215638.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Saraighat Bridge</h3>
            <!--<p></p>-->
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Welcome to Assam State Covid19 Management Portal</h1>

    
    

    <div class="row">
		<div class="col-lg-6">
			<?php echo($userLoggedIn==0)? "Please login or register to use the sevices": "Logged in as ".$userDetails['user_email'].""; ?>
		</div>
		
	</div>

    
    

    <!-- Features Section -->
    <div class="row">
      <div class="col-lg-6">
        <h2>Covid 19 management portal</h2>
        <p>Covid 19 management web portal for the state of assam built for covid19hackathon</p>
        <ul>
          <li>
            <strong>Services</strong>
          </li>
          <a class="dropdown-item" href="foodSupplyForIsolatedPatient.php">Food Supply For Isolated Patient</a>
              <a class="dropdown-item" href="#">Essential Service Transport Pass</a>
              <a class="dropdown-item" href="#">Personal Pass</a>
              <a class="dropdown-item" href="#">Counselling For Patients</a>
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
  <footer class="py-5 bg-light ">
    <div class="container">
      <p class="m-0 text-center text-dark">Copyright &copy; Swapnanil Pathak 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>

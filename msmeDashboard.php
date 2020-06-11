<?php
 
  define('__CONFIG__',true);

  require_once("include/config.php");

  if(!isset($_SESSION['user_type'])){
    header("location:/msmeLogout.php");exit;
  }else{
    if($_SESSION['user_type']!=="msme"){
      header("location:/msmeLogout.php");exit;
    }
  }
  


 
 if(isset($_SESSION['user_id'])){
    $userId = $_SESSION['user_id'];
  $getUserInfo = $con->prepare("SELECT * FROM msmes WHERE id= :id LIMIT 1");
  $getUserInfo->bindParam(':id',$userId,PDO::PARAM_INT);
  $getUserInfo->execute();
  if($getUserInfo->rowCount()==1){
    $userDetails = $getUserInfo->fetch(PDO::FETCH_ASSOC);
    
   
  }else{
   header("location:/msmeLogout.php");exit;
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
<?php require("navbarForMSME.php"); ?>
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active"  style="background-image: url('assets/images/splash.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3></h3>
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

    <h1 class="my-4 text-center">Welcome to MSME dashboard</h1>

    
    <div class="row text-center">
      <div class="col-lg-12 col-md-6">
        
         

      </div>
    </div>

    <div class="row">
      
		<div class="col-lg-6">
			
		</div>
		
	</div>

    
    

    <!-- Features Section -->
    <div class="row">
      <div class="col-lg-6">
        
        
      </div>
      <div class="col-lg-6">
        
      </div>
    </div>
    <!-- /.row -->

    

    

  </div>
  <!-- /.container -->

<?php require_once("footer.php") ?>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>

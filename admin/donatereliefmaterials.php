<?php
 
  define('__CONFIG__',true);

  require_once("../include/config.php");

  
  if(isset($_SESSION['id'])){
    
  }else{
   
    header("location:/admin/index.php");
  }


 
  $userId = $_SESSION['id'];
  $getUserInfo = $con->prepare("SELECT * FROM adminusers WHERE id= :id LIMIT 1");
  $getUserInfo->bindParam(':id',$userId,PDO::PARAM_INT);
  $getUserInfo->execute();
  if($getUserInfo->rowCount()==1){
    $userDetails = $getUserInfo->fetch(PDO::FETCH_ASSOC);

   if(isset($_POST['address_id'])){
    if(isset($_POST['new_status'])){
      $addr = $_POST['address_id'];
      $stat = $_POST['new_status'];
      $updateQ = $con->prepare("UPDATE donatereliefmaterials SET status =:status WHERE id=:addr ");
      $updateQ->bindParam("status",$stat);
      $updateQ->bindParam("addr",$addr);
      $updateQ->execute();
    }
   }


  }else{
    header("location:/admin/logout.php");exit;
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/modern-business.css" rel="stylesheet">

</head>

<body>

  <?php require("navbar.php");?>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Admin
    </h1>

    

    <!-- Intro Content -->
    <div class="row">
      <div class="col-lg-12">
        <h4>Relief materials donation Requests</h4>
          <div style="overflow-x:auto;">
  <table class="table">
    <tr><th>Full Name</th><th>Address</th><th>district</th><th>pincode</th><th>phone number</th><th>Type</th><th>quantity</th><th>Status</th></tr>
            <?php 
              $foodSupplyList = $con->prepare("SELECT * FROM donatereliefmaterials");

              $foodSupplyList->execute();
              while($row = $foodSupplyList->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$row['fullname']."</td><td>".$row['address']."</td><td>".$row['district']."</td><td>".$row['pincode']."</td><td>".$row['phoneno']."</td><td>".$row['donationtype']."</td><td>".$row['quantity']."</td><td><form method='POST' action=''>

                <input type ='hidden' name='address_id' value=".$row['id'].">
                <select name='new_status'>
                <option selected>".$row['status']."</option>
                <option>processing</option>
                <option>initiated</option>
                <option>recieved</option>
                
                </select>
                <input type='submit' value='GO' class='btn btn-dark'>
                </form></td>";
              }


            ?>
  </table>
</div>



      </div>
      
    </div>
    <!-- /.row -->

    

    

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-light">
    <div class="container">
      <p class="m-0 text-center text-dark">Copyright &copy; Swapnanil Pathak 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/adminAuth.js"></script>

</body>

</html>
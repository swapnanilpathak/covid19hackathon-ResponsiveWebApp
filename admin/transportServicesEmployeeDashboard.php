<?php
 
  define('__CONFIG__',true);

  require_once("../include/config.php");

  
  if(isset($_SESSION['id'])){
    
  }else{
   
    header("location:/admin/index.php");
  }


 
  $userId = $_SESSION['id'];

  $getUserInfo = $con->prepare("SELECT * FROM employees WHERE id= :id LIMIT 1");
  $getUserInfo->bindParam(':id',$userId,PDO::PARAM_INT);
  $getUserInfo->execute();
  if($getUserInfo->rowCount()==1){
    $userDetails = $getUserInfo->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['address_id_ep'])){
    if(isset($_POST['new_status_ep'])){
      $addr = $_POST['address_id_ep'];
      $stat = $_POST['new_status_ep'];
      $updateQ = $con->prepare("UPDATE essentialpass SET status =:status WHERE id=:addr ");
      $updateQ->bindParam("status",$stat);
      $updateQ->bindParam("addr",$addr);
      $updateQ->execute();
    }
   }

   if(isset($_POST['address_id_pp'])){
    if(isset($_POST['new_status_pp'])){
      $addr = $_POST['address_id_pp'];
      $stat = $_POST['new_status_pp'];
      $updateQ = $con->prepare("UPDATE personalpass SET status =:status WHERE id=:addr ");
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

  <title>Employee</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/modern-business.css" rel="stylesheet">

</head>

<body>

 
<?php require("navbarFoodServices.php");?>
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Employee Dashboard
    </h1>

    

    
    <!-- /.row -->
        <div class="row">
      <div class="col-lg-12">
        <h4>Personal Pass requests for <?php echo $userDetails['district'];?></h4>
          <div style="overflow-x:auto;">
  <table class="table">
    <tr><th>Full Name</th><th>Address Line 1</th><th>Address Line 2</th><th>City/Town/Village</th><th>District</th><th>pincode</th><th>phone number</th><th>time</th><th>Status</th></tr>
            <?php 
              $foodSupplyList = $con->prepare("SELECT * FROM personalpass WHERE district = :dist");
              $foodSupplyList->bindParam("dist",$userDetails['district']);
             $foodSupplyList->execute();
              while($row = $foodSupplyList->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$row['fullname']."</td><td>".$row['address']."</td><td>".$row['city']."</td><td>".$row['district']."</td><td>".$row['pincode']."</td><td>".$row['phoneno']."</td><td>".$row['reason']."</td><td>".$row['additionalpeople']."</td><td>".$row['timesubmitted']."</td><td><form method='POST' action='transportServicesEmployeeDashboard.php'>

                <input type ='hidden' name='address_id_pp' value=".$row['id'].">
                <select name='new_status_pp'>
                <option selected>".$row['status']."</option>
                <option>Processing</option>
                <option>Initiated</option>
                <option>Approved</option>
                
                </select>
                <input type='submit' value='GO' class='btn btn-dark'>
                </form></td>";
              }


            ?>
  </table>
</div>



      </div>
      
    </div>

        <div class="row">
      <div class="col-lg-12">
        <h4>Essential Pass Requests for <?php echo $userDetails['district'];?></h4>
          <div style="overflow-x:auto;">
  <table class="table">
    <tr><th>Full Name</th><th>Address</th><th>City/Town/Village</th><th>District</th><th>pincode</th><th>phone number</th><th>reason</th><th>Vehicle Regd No</th><th>From</th><th>To</th><th>destination</th><th>time</th><th>Status</th></tr>
            <?php 
              $foodSupplyList = $con->prepare("SELECT * FROM essentialpass WHERE district = :dist");
              $foodSupplyList->bindParam("dist",$userDetails['district']);
              $foodSupplyList->execute();
              while($row = $foodSupplyList->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$row['fullname']."</td><td>".$row['address']."</td><td>".$row['city']."</td><td>".$row['district']."</td><td>".$row['pincode']."</td><td>".$row['phoneno']."</td><td>".$row['reason']."</td><td>".$row['vregdno']."</td><td>".$row['fromdate']."</td><td>".$row['todate']."</td><td>".$row['destination']."</td><td>".$row['timesubmitted']."</td><td><form method='POST' action='transportServicesEmployeeDashboard.php'>

                <input type ='hidden' name='address_id_ep' value=".$row['id'].">
                <select name='new_status_ep'>
                <option selected>".$row['status']."</option>
                <option>Processing</option>
                <option>Initiated</option>
                <option>Approved</option>
                
                </select>
                <input type='submit' value='GO' class='btn btn-dark'>
                </form></td>";
              }


            ?>
  </table>
</div>



      </div>
      
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
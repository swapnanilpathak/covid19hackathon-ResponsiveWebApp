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

    if(isset($_POST['daid'])){
    if(isset($_POST['das'])){
      $addr = $_POST['daid'];
      $stat = $_POST['das'];
      $updateQ = $con->prepare("UPDATE doctorappointments SET status =:status WHERE id=:addr ");
      $updateQ->bindParam("status",$stat);
      $updateQ->bindParam("addr",$addr);
      $updateQ->execute();
    }
   }

   if(isset($_POST['haid'])){
    if(isset($_POST['has'])){
      $addr = $_POST['haid'];
      $stat = $_POST['has'];
      $updateQ = $con->prepare("UPDATE hospitaladmissions SET status =:status WHERE id=:addr ");
      $updateQ->bindParam("status",$stat);
      $updateQ->bindParam("addr",$addr);
      $updateQ->execute();
    }
   }

   if(isset($_POST['psdid'])){
    if(isset($_POST['psds'])){
      $addr = $_POST['psdid'];
      $stat = $_POST['psds'];
      $updateQ = $con->prepare("UPDATE patientsymptomdata SET status =:status WHERE id=:addr ");
      $updateQ->bindParam("status",$stat);
      $updateQ->bindParam("addr",$addr);
      $updateQ->execute();
    }
   }

   if(isset($_POST['cid'])){
    if(isset($_POST['cs'])){
      $addr = $_POST['cid'];
      $stat = $_POST['cs'];
      $updateQ = $con->prepare("UPDATE counsellings SET status =:status WHERE id=:addr ");
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
        <h4>Doctor Appointment requests for <?php echo $userDetails['district'];?></h4>
          <div style="overflow-x:auto;">
  <table class="table">
    <tr><th>Full Name</th><th>Gender</th><th>district</th><th>Phone</th><th>Department</th><th>Appointment Date</th><th>Time Submitted</th><th>Status</th></tr>
            <?php 
              $foodSupplyList = $con->prepare("SELECT * FROM doctorappointments WHERE district = :dist");
              $foodSupplyList->bindParam("dist",$userDetails['district']);
             $foodSupplyList->execute();
              while($row = $foodSupplyList->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$row['fullname']."</td><td>".$row['gender']."</td><td>".$row['district']."</td><td>".$row['phone']."</td><td>".$row['dept']."</td><td>".$row['appointmentdate']."</td><td>".$row['timesubmitted']."</td><td>".$row['status']."</td><td><form method='POST' action='medicalEmployeeDashboard.php'>

                <input type ='hidden' name='daid' value=".$row['id'].">
                <select name='das'>
                <option selected>".$row['status']."</option>
                <option>Appointed</option>
                
                
                <option>Processing</option>
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
        <h4>Hospital Admission Requests for <?php echo $userDetails['district'];?></h4>
          <div style="overflow-x:auto;">
  <table class="table">
    <tr><th>Full Name</th><th>Age</th><th>Gender</th><th>Address</th><th>City/Town/Village</th><th>District</th><th>pincode</th><th>phone number</th><th>Next Of Kin</th><th>Admission Date Requested</th><th>timesubmitted</th><th>status</th></tr>
            <?php 
              $foodSupplyList = $con->prepare("SELECT * FROM hospitaladmissions WHERE district = :dist");
              $foodSupplyList->bindParam("dist",$userDetails['district']);
              $foodSupplyList->execute();
              while($row = $foodSupplyList->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$row['fullname']."</td><td>".$row['age']."</td><td>".$row['gender']."</td><td>".$row['address']."</td><td>".$row['city']."</td><td>".$row['district']."</td><td>".$row['pincode']."</td><td>".$row['phoneno']."</td><td>".$row['kinname']."</td><td>".$row['admdate']."</td><td>".$row['timesubmitted']."</td><td><form method='POST' action='medicalEmployeeDashboard.php'>

                <input type ='hidden' name='haid' value=".$row['id'].">
                <select name='has'>
                <option selected>".$row['status']."</option>
                <option>Initiated</option>
                <option>Admitted</option>
                
                <option>Processing</option>
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
        <h4>Patient Data for <?php echo $userDetails['district'];?></h4>
          <div style="overflow-x:auto;">
  <table class="table">
    <tr><th>Full Name</th><th>Address</th><th>District</th><th>pincode</th><th>phone number</th><th>Fever</th><th>Cough</th><th>Respiratory Distress</th><th>Travel History</th><th>Timesubmitted</th><th>status</th></tr>
            <?php 
              $foodSupplyList = $con->prepare("SELECT * FROM patientsymptomdata WHERE district = :dist");
              $foodSupplyList->bindParam("dist",$userDetails['district']);
              $foodSupplyList->execute();
              while($row = $foodSupplyList->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$row['fullname']."</td><td>".$row['address']."</td><td>".$row['district']."</td><td>".$row['pincode']."</td><td>".$row['phoneno']."</td><td>".$row['fever']."</td><td>".$row['cough']."</td><td>".$row['respiratorydistress']."</td><td>".$row['travelhistory']."</td><td>".$row['timesubmitted']."</td><td><form method='POST' action='medicalEmployeeDashboard.php'>

                <input type ='hidden' name='psdid' value=".$row['id'].">
                <select name='psds'>
                <option selected>".$row['status']."</option>
                
                <option>Seen</option>
                
                <option>Processing</option>
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
        <h4>Patient Data for <?php echo $userDetails['district'];?></h4>
          <div style="overflow-x:auto;">
  <table class="table">
    <tr><th>Full Name</th><th>Date Requested</th><th>District</th><th>Timesubmitted</th><th>status</th></tr>
            <?php 
              $foodSupplyList = $con->prepare("SELECT * FROM counsellings WHERE district = :dist");
              $foodSupplyList->bindParam("dist",$userDetails['district']);
              $foodSupplyList->execute();
             while($row = $foodSupplyList->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$row['fullname']."</td><td>".$row['cdate']."</td><td>".$row['district']."</td>"."<td>".$row['timesubmitted']."</td><td><form method='POST' action='medicalEmployeeDashboard.php'>

                <input type ='hidden' name='cid' value=".$row['id'].">
                <select name='cs'>
                <option selected>".$row['status']."</option>
                
                <option>Seen</option>
                
                <option>Processing</option>
                </select>
                <input type='submit' value='GO' class='btn btn-dark'>
                </form></td>";
              }


            ?>
  </table>
</div>



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
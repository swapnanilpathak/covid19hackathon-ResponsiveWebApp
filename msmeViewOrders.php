<?php
 
  define('__CONFIG__',true);

  require_once("include/config.php");

  
  ForceLogin();

  if(!isset($_SESSION['user_type'])){
    header("location:/msmeLogout.php");exit;
  }else{
    if($_SESSION['user_type']!=="msme"){
      header("location:/msmeLogout.php");exit;
    }
  }

  // echo $_SESSION['user_id'].' is your session id';
  $userId = $_SESSION['user_id'];
  $getUserInfo = $con->prepare("SELECT * FROM msmes WHERE id= :id LIMIT 1");
  $getUserInfo->bindParam(':id',$userId,PDO::PARAM_INT);
  $getUserInfo->execute();
  if($getUserInfo->rowCount()==1){
    $userDetails = $getUserInfo->fetch(PDO::FETCH_ASSOC);

     
  if(isset($_POST['id'])){
    if(isset($_POST['new_status'])){
      $addr = $_POST['id'];
      $stat = $_POST['new_status'];
      $updateQ = $con->prepare("UPDATE msmeorders SET status =:status WHERE id=:addr ");
      $updateQ->bindParam("status",$stat);
      $updateQ->bindParam("addr",$addr);
      $updateQ->execute();
    }
   }

   
  }else{
    header("location:/msmeLogout.php");exit;
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>View your MSME orders</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/modern-business.css" rel="stylesheet">

</head>

<body>

  <?php require("navbarForMSME.php")?>

    <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">View your MSME orders
    </h1>

    

    <!-- Intro Content -->
    <div class="row">
      <div class="col-lg-12">
        <h4>Orders placed on your products</h4>
          <div style="overflow-x:auto;">
  <table class="table">
    <tr><th>Product Name</th><th>Quantity</th><th>Full Name</th><th>address</th><th>District</th><th>phoneno</th><th>pincode</th><th>time submitted</th><th>Status</th></tr>
            <?php 
              $foodSupplyList = $con->prepare("SELECT msmeorders.*, msmeproducts.*
FROM msmeorders
INNER JOIN msmeproducts ON msmeorders.productid=msmeproducts.productid  where msmeorders.msmeid = :id;");
              $foodSupplyList->bindParam(":id",$_SESSION['user_id']);

              $foodSupplyList->execute();
              while($row = $foodSupplyList->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$row['productname']."</td><td>".$row['quantity']."</td><td>".$row['fullname']."</td><td>".$row['address']."</td><td>".$row['district']."</td><td>".$row['phoneno']."</td><td>".$row['pincode']."</td><td>".$row['timesubmitted']."</td><td><form method='POST' action=''>

                <input type ='hidden' name='id' value=".$row['id'].">
                <select name='new_status'>
                <option selected>".$row['status']."</option>
                <option value ='Initiated'>Initiated</option>
                <option value='Dispatched'>Dispatched</option>
                <option value = 'Delivered'>Delivered</option>
                <option value = 'Processing'>Processing</option>
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

<?php require_once("footer.php") ?>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/js/addMSMEProduct.js"></script> -->
</body>

</html>
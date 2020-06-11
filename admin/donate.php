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
    $msg="";

    if(isset($_POST['submit'])){

     $title = $_POST['f_t'];
     $name = $_POST['f_n'];
     $no = $_POST['f_an'];
     $ifsc = $_POST['f_ifsc'];
     $upi = $_POST['f_upi'];
     $desc = $_POST['f_d'];

      if($title==''||$desc==''){
        $msg = "Title and Description mandatory to fill";

      }else{
        $datalist = array($title ,
     $name ,
     $no ,
     $ifsc ,
     $upi ,
     $desc );
        $query = $con->prepare("INSERT INTO `donationdetails`( `title`, `bankaccountname`, `bankaccountno`, `bankifsccode`, `upiid`, `description`) VALUES (?,?,?,?,?,?)");
        $query->execute($datalist);
        $msg = "Successfully Added";
      }

    }

    if(isset($_POST['delete'])){
      if($_POST['id']!=''){
        $query = $con->prepare("DELETE FROM `donationdetails` WHERE id = :id");
        $query->bindParam("id",$_POST['id']);
        $query->execute();
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

  <title>Add Donation Details</title>

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
        <h2>Add Donation Details</h2>
        <?php if ($msg!='')echo $msg;?>



      </div>
      
    </div>
    <!-- /.row -->
    <div class="row">


      <div class="col-lg-12 col-md-6">
        <form action="donate.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Title*</label>
    <input type="text" name="f_t" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Bank Name*</label>
    <input type="text" name="f_n" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Bank Account Number*</label>
    <input type="text" name="f_an" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Bank Account IFSC code*</label>
    <input type="text" name="f_ifsc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">UPI ID*</label>
    <input type="text" name="f_upi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Description*</label>
    <input type="text" name="f_d" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    
  </div>


  <button type="submit" name="submit" class="btn btn-dark">Submit</button>
</form>
      </div>
      <div class="col-lg-12 col-md-6">
         <table class="table">
    <tr><th>Title</th><th>Bank Name</th><th>Bank Account No</th><th>Bank IFSC code</th><th>UPI ID</th><th>Description</th></tr>
            <?php 
              $query = $con->prepare("SELECT * FROM donationdetails");

              $query->execute();
              while($row = $query->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$row['title']."</td><td>".$row['bankaccountname']."</td><td>".$row['bankaccountno']."</td><td>".$row['bankifsccode']."</td><td>".$row['upiid']."</td><td>".$row['description']."</td><td>"."<form method='POST' action='donate.php'>

                <input type ='hidden' name='id' value=".$row['id'].">
                
                
                
                <input type='submit' name='delete' value='DELETE' class='btn btn-dark'>
                </form></td>";
              }


            ?>
  </table>
      </div>
                            
    </div>

    

        <div class="row">
      <div class="col-lg-12 col-md-6" style="overflow-x:auto">

        





      </div>
      <div class="col-lg-12 col-md-6">

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
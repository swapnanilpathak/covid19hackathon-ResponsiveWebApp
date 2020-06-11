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

     $un = $_POST['f_un'];
     $pd = $_POST['f_pd'];
     $dept = $_POST['f_dept'];
     $district = $_POST['f_district'];
     

      if($un==''||$pd==''||$dept==''||$district==''){
        $msg = "All fields are mandatory to fill";

      }else{
        $pd = password_hash($pd, PASSWORD_DEFAULT);
        $datalist = array($un ,
     $pd ,
     $dept ,
     $district);
        $query = $con->prepare("INSERT INTO `employees`(  `username`, `password`, `dept`, `district`) VALUES (?,?,?,?)");
        $query->execute($datalist);
        $msg = "Successfully Added";
      }

    }

    if(isset($_POST['delete'])){
      if($_POST['id']!=''){
        $query = $con->prepare("DELETE FROM `employees` WHERE id = :id");
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
        <h2>Create An Employee</h2>
        <?php if ($msg!='')echo $msg;?>



      </div>
      
    </div>
    <!-- /.row -->
    <div class="row">


      <div class="col-lg-12 col-md-6">
        <form action="createemployee.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Username*</label>
    <input type="text" name="f_un" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password*</label>
    <input type="text" name="f_pd" class="form-control" id="exampleInputPassword1" >
  </div>
  
  <div class="control-group">
                    <label class="control-label">Department*</label>
                    <div class="controls">
                        <select id="district" name="f_dept" class="input-xlarge">
                            
<option value="medicalservices">medicalservices</option>
<option value="foodsupplyservices">foodsupplyservices</option>
<option value="transportservices">transportservices</option>


                        </select>
                    </div>
                </div>


  <div class="control-group">
                    <label class="control-label">District*</label>
                    <div class="controls">
                        <select id="district" name="f_district" class="input-xlarge">
                            
<?php require_once("..\districtList.php");?>

                        </select>
                    </div>
                </div>

  


  

  <button type="submit" name="submit" class="btn btn-dark">Submit</button>
</form>
      </div>
      <div class="col-lg-12 col-md-6">
         <table class="table">
    <tr><th>Username</th><th>Department</th><th>District</th><th>Delete An Employee</th></tr>
            <?php 
              $query = $con->prepare("SELECT * FROM employees");

              $query->execute();
              while($row = $query->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$row['username']."</td><td>".$row['dept']."</td><td>".$row['district']."<td><form method='POST' action='createemployee.php'>

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
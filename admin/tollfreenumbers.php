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

      $t = $_POST['f_t'];
      $n = $_POST['f_n'];
      $d = $_POST['f_d'];

      if($t==''||$n==''||$d==''){
        $msg = "Some fields Missing";

      }else{
        $datalist = array($t,$n,$d);
        $query = $con->prepare("INSERT INTO `tollfreenumbers`( `title`, `number`, `description`) VALUES (?,?,?)");
        $query->execute($datalist);
        $msg = "Successfully Added";
      }

    }

    if(isset($_POST['delete'])){
      if($_POST['id']!=''){
        $query = $con->prepare("DELETE FROM `tollfreenumbers` WHERE id = :id");
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

  <title>Toll free numbers</title>

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
        <h2>Toll Free Numbers</h2>
        <?php if ($msg!='')echo $msg;?>



      </div>
      
    </div>
    <!-- /.row -->
    <div class="row">


      <div class="col-lg-12 col-md-6">
        <form action="tollfreenumbers.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Title*</label>
    <input type="text" name="f_t" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Number*</label>
    <input type="text" name="f_n" class="form-control" id="exampleInputPassword1" placeholder="Number">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Description*</label>
    <input type="text" name="f_d" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Description">
    
  </div>
  <button type="submit" name="submit" class="btn btn-dark">Submit</button>
</form>
      </div>
      <div class="col-lg-12 col-md-6">
         <table class="table">
    <tr><th>Title</th><th>Number</th><th>Description</th></tr>
            <?php 
              $foodSupplyList = $con->prepare("SELECT * FROM tollfreenumbers");

              $foodSupplyList->execute();
              while($row = $foodSupplyList->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$row['title']."</td><td>".$row['number']."</td><td>".$row['description']."</td><td>"."</td><td><form method='POST' action='tollfreenumbers.php'>

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
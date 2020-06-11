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

     
    if(isset($_POST['delete'])){
      if($_POST['id']!=''){
        $query = $con->prepare("DELETE FROM `msmeproducts` WHERE productid = :id");
        $query->bindParam("id",$_POST['id']);
        $query->execute();
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

  <title>View your MSME Product</title>

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
    <h1 class="mt-4 mb-3">View your MSME products
      
    </h1>

    
    <?php 
    $query = $con->prepare("SELECT * FROM msmeproducts where msmeid = :userid");
    $query->bindParam("userid",$_SESSION['user_id']);
    $query->execute();
    
    ?>


    <div class="row">
      <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)){?>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100 border-primary">
          <?php $img = "uploads/".$row['productimage'];?>
          <img height="300px" width="200px" class="card-img-top" src="<?php echo ($row['productimage']!='')?$img:'uploads/default.jpg';?>" alt="" >
          <div class="card-body">
            <h4 class="card-title text-primary">
              <?php echo "Name: ". $row['productname']; ?>
            </h4>
                  <ul class="list-group list-group-flush">
                  <li class="list-group-item"><?php echo "Type: ". $row['producttype']; ?></li>
                  <li class="list-group-item"><?php echo "Price: ". $row['productprice']; ?></li>
                  
                  </ul>
            <p class="card-text"><?php echo "Description: ".$row['productdesc']; ?></p>


            <form method='POST' action='msmeViewProducts.php'>

                <input type ='hidden' name='id' value="<?php echo $row['productid'];?>">
                
                
                
                <input type='submit' name='delete' value='DELETE' class='btn btn-primary'>
                </form>
          </div>
        </div>
      </div>
      
      <?php }?>
      
      
      
    </div>

    <!-- Pagination -->
    <!-- <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">«</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">1</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">2</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">3</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">»</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul> -->

  </div>

<?php require_once("footer.php") ?>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/js/addMSMEProduct.js"></script> -->
</body>

</html>
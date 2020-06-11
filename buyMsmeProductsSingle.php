<?php
 
  define('__CONFIG__',true);

  require_once("include/config.php");

  
  ForceLogin();


  // echo $_SESSION['user_id'].' is your session id';
  $userId = $_SESSION['user_id'];
  $getUserInfo = $con->prepare("SELECT * FROM users WHERE user_id= :id LIMIT 1");
  $getUserInfo->bindParam(':id',$userId,PDO::PARAM_INT);
  $getUserInfo->execute();
  if($getUserInfo->rowCount()==1){
    $userDetails = $getUserInfo->fetch(PDO::FETCH_ASSOC);
    

if (isset($_GET['productid'])) {
            if ( ! ctype_digit(strval($_GET['productid'])) ) {
   die("404 not found <a href=\"index.php\">Home</a>");
}else{
  $id = $_GET['productid'];
  $queryproductid = $con->prepare("SELECT * FROM msmeproducts WHERE productid =:id LIMIT 1");
  $queryproductid->bindValue("id", $id);
  $queryproductid->execute();
  if($queryproductid->rowCount()==1){
    $productidContent = $queryproductid->fetch(PDO::FETCH_ASSOC);
  }else{
     die("404 not found <a href=\"index.php\">Home</a>");
  }
}
        } else {
            die("404 not found <a href=\"index.php\">Home</a>");
        }




   
  }else{
    header("location:/logout.php");exit;
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

  <?php require("navbarForUsers.php")?>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
      <small>Order this MSME product</small>
      
    </h1>

    

    <!-- Intro Content -->
    <div class="row">
      
      <div class="col-lg-6">

          <div class=" portfolio-item">
          <div class="card h-100 border-primary">
          <?php $img = "uploads/".$productidContent['productimage'];?>
          <img height="300px" width="200px" class="card-img-top" src="<?php echo ($productidContent['productimage']!='')?$img:'uploads/default.jpg';?>" alt="" >
          <div class="card-body">
          <h4 class="card-title text-primary">
          <?php echo "Name: ". $productidContent['productname']; ?>
          </h4>
          <ul class="list-group list-group-flush">
          <li class="list-group-item"><?php echo "Type: ". $productidContent['producttype']; ?></li>
          <li class="list-group-item"><?php echo "Price: ". $productidContent['productprice']; ?></li>

          </ul>
          <p class="card-text"><?php echo "Description: ".$productidContent['productdesc']; ?></p>


          

         




         
          </div>
          </div>
          </div>


      </div>
      <div class="col-lg-6">
        <!--form-->
          <form class="form-horizontal buymsmeproducts" id="form">
            <input type="hidden" name="f_msmeid" value="<?php echo $productidContent['msmeid']; ?>">
            <input type="hidden" name="f_userid" value="<?php echo $userDetails['user_id']?>">
            <input type="hidden" name="f_productid" value="<?php echo $productidContent['productid']; ?>">

            
                <!-- Address form -->
         
                <h2>please submit this form</h2>
         
                
                  <div class="control-group">
                    <label class="control-label">Quantity*</label>
                    <div class="controls">
                        <input id="city" value="1" name="f_quantity"  type="number" placeholder="" class="input-xlarge" min="1" max="10">
                        <p class="help-block"></p>
                    </div>
                </div>


                <!-- full-name input-->
                <div class="control-group">
                    <label class="control-label">Full Name*</label>
                    <div class="controls">
                        <input id="full-name" name="f_fullname" type="text" placeholder="full name"
                        class="input-xlarge">
                        <p class="help-block"></p>
                    </div>
                </div>
                <!-- address-line1 input-->
                <div class="control-group">
                    <label class="control-label">Address*</label>
                    <div class="controls">
                        <input id="address-line1" name="f_address" type="text" placeholder="address"
                        class="input-xlarge">
                        
                    </div>
                </div>
                <!-- address-line2 input-->
                
                
               
                
                <!-- country select -->
                <div class="control-group">
                    <label class="control-label">District*</label>
                    <div class="controls">
                        <select id="district" name="f_district" class="input-xlarge">
                            
<?php require_once("districtList.php");?>

                        </select>
                    </div>
                </div>
                <!-- productidal-code input-->
                <div class="control-group">
                    <label class="control-label">Pin Code*</label>
                    <div class="controls">
                        <input id="productidal-code" name="f_pincode" type="text" placeholder="pin code"
                        class="input-xlarge">
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Phone Number*</label>
                    <div class="controls">
                        <input id="city" name="f_phoneno" type="text" placeholder="Phone Number" class="input-xlarge">
                        <p class="help-block"></p>
                    </div>
                </div>
           

            <input type="submit" name="submit" value="Buy" class="btn btn-dark">
            <div class="errorText"></div>
        </form>

        <!--form-->
      </div>
    </div>
    <!-- /.row -->

    

    

  </div>
  <!-- /.container -->

<?php require_once("footer.php") ?>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
   <script src="assets/js/addmsmeorders.js"></script>
 
</body>

</html>
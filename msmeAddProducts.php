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

      $msg="";
      $picuploaderror="";
      if(isset($_POST['submit'])){

      $productname = $_POST['productname'];
      $producttype = $_POST['producttype'];
      $productdesc = $_POST['productdesc'];
      $productprice = $_POST['productprice'];
      $productimage = "";

      if($productname==''||$producttype==''||$productdesc==''||$productprice==''){
      $msg = "Name, Type, Description and Price mandatory to fill";

      }else{

      if(isset($_FILES['productimage'])){
        $fileid="productimage";
        $uploadOk=0;
        /* Getting file name */
      $rand = rand(0000,9999).time();
      
      $image_to_upload = $rand.$_FILES[$fileid]['name'];
      $productimagename = $image_to_upload;
      /* Location */
      $location = 'uploads\\'.basename($image_to_upload);
      $uploadOk = 1;
      $imageFileType = pathinfo($location,PATHINFO_EXTENSION);

      /* Valid Extensions */
      $valid_extensions = array("jpg","jpeg","png","gif");
      /* Check file extension */
      if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
        $uploadOk = 0;
      }

      if($uploadOk == 0){
        $picuploaderror='Sorry Can\'t upload image not a jpg, jpeg, png or gif';
      }else{
        /* Upload file */
        if(move_uploaded_file($_FILES[$fileid]['tmp_name'],$location)){
          $picuploaderror='image uploaded';
          $productimage=$productimagename;
        }else{
          $picuploaderror='Sorry Can\'t upload image';
        }
      }
      
      }


      $datalist = array($_SESSION['user_id'],$productname ,
      $producttype ,
      $productdesc ,
      $productprice,
      $productimage );
      $query = $con->prepare("INSERT INTO `msmeproducts`( `msmeid`,`productname`, `producttype`, `productdesc`, `productprice`, `productimage`) VALUES (?,?,?,?,?,?)");
      $query->execute($datalist);
      $msg = "Successfully Added Product Data";
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

  <title>Add MSME Product</title>

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
    <h1 class="mt-4 mb-3">
      <small>Add your products to our database</small>
      
    </h1>

    

    <!-- Intro Content -->
    <div class="row">
      
      <div class="col-lg-6">

        <h2>Add your products</h2>
        <p>Please fill the accompanying form for adding you product to our database </p>
      </div>
      <div class="col-lg-6">
        <!--form-->
          <form class="form-horizontal " id="form" method="POST" action="msmeAddProducts.php" enctype="multipart/form-data">
            <input type="hidden" name="f_id" value="<?php echo $userDetails['id']?>">
            
                
         
                <!-- full-name input-->
                <div class="control-group">
                    <label class="control-label">Product Name*</label>
                    <div class="controls">
                        <input id="full-name" name="productname" type="text" 
                        class="input-xlarge">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Product Type*</label>
                    <div class="controls">
                        <input id="full-name" name="producttype" type="text" 
                        class="input-xlarge">
                        <p class="help-block"></p>
                    </div>
                </div>
                
                <!-- address-line1 input-->
                <div class="control-group">
                    <label class="control-label">Product Description*</label>
                    <div class="controls">
                        <input id="address-line1" name="productdesc" type="text"
                        class="input-xlarge">
                        
                    </div>
                </div>
                
                <!-- city input-->
                <div class="control-group">
                    <label class="control-label">Product Price*</label>
                    <div class="controls">
                        <input id="city" name="productprice" type="text"  class="input-xlarge">
                        <p class="help-block"></p>
                    </div>
                </div>
               
                
                
                <!-- postal-code input-->
                <div class="control-group">
                    <label class="control-label">Product image</label>
                    <div class="controls">
                        <input  name="productimage" type="file" 
                        class="input-xlarge">
                        <p class="help-block"></p>
                    </div>
                </div>

                

                

                
                
                
           

            <input type="submit" name="submit" value="Submit" class="btn btn-dark">
            <div class="errorText"><?php echo $msg.'<br>'.$picuploaderror;?></div>
        </form>

        <!--form-->
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      
      <div class="col-lg-6">
        <h2></h2>
        

        
      </div>
      
    </div>
    

    

  </div>
  <!-- /.container -->

<?php require_once("footer.php") ?>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/js/addMSMEProduct.js"></script> -->
</body>

</html>
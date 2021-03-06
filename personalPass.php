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

  <title>Essential Transport Pass</title>

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
      <small>Personal Pass</small>
      
    </h1>

    

    <!-- Intro Content -->
    <div class="row">
      
      <div class="col-lg-6">

        <h2>Personal pass</h2>
        <p>Please fill the accompanying form to submit your request </p>
      </div>
      <div class="col-lg-6">
        <!--form-->
          <form class="form-horizontal personalPass" id="form">
            <input type="hidden" name="f_id" readonly="" value="<?php echo $userDetails['user_id']?>">
            
                
         
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
                
                <!-- city input-->
                <div class="control-group">
                    <label class="control-label">City / Town / Village*</label>
                    <div class="controls">
                        <input id="city" name="f_city" type="text" placeholder="city" class="input-xlarge">
                        <p class="help-block"></p>
                    </div>
                </div>
               
                
                <!-- country select -->
                <div class="control-group">
                    <label class="control-label">District*</label>
                    <div class="controls">
                        <select id="district" name="f_district" class="input-xlarge">
                            
<?php require_once("districtList.php");?>

                        </select>
                    </div>
                </div>
                <!-- postal-code input-->
                <div class="control-group">
                    <label class="control-label">Pin Code*</label>
                    <div class="controls">
                        <input id="postal-code" name="f_pincode" type="text" placeholder="pin code"
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

                <div class="control-group">
                    <label class="control-label">Reason For Pass*</label>
                    <div class="controls">
                        <input id="city" name="f_reason" type="text" placeholder="Explain your reason" class="input-xlarge">
                        <p class="help-block"></p>
                    </div>
                </div>

               
                
                
                <div class="control-group">
                    <label class="control-label">How many people are with you*</label>
                    <div class="controls">
                        <input id="city" name="f_addpeople"  type="number" placeholder="" class="input-xlarge" min="0" max="10">
                        <p class="help-block"></p>
                    </div>
                </div>
           

            <input type="submit" name="submit" value="Submit" class="btn btn-dark">
            <div class="errorText"></div>
        </form>

        <!--form-->
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      
      <div class="col-lg-6">
        <h2>Status</h2>
        

        <?php 

              $querySubmitsByUser = $con->prepare("SELECT * FROM personalpass WHERE userid = :id");
              $querySubmitsByUser->bindParam("id",$userDetails['user_id']);
              if($querySubmitsByUser->execute()){


                if($querySubmitsByUser->rowCount()==0){
   echo '<p>You have not summitted any query related to this service</p>';

   
  }else{
                echo '<table class="table"><tr>
    <th>Submitted on</th>
    <th>Status</th>
    <th>Download</th>
  </tr>';
                    while ($row = $querySubmitsByUser->fetch(PDO::FETCH_ASSOC)) {
                          echo '<tr><td>'.$row['timesubmitted'].'</td><td>'.$row['status'].'</td>';
                          $action='<form method="POST" action="personalpasspdf.php" target="_blank"><input type = "hidden" name="passid" value='.$row['id'].'><input type="submit" value="click" class="btn btn-dark"></form>';
                           echo '<td>'.((strtolower($row['status'])=='approved')?$action:'').'</td></tr>';
    }
    echo '</table>';
  }
}
         ?>
      </div>
      
    </div>
    

    

  </div>
  <!-- /.container -->

<?php require_once("footer.php") ?>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/addPersonalPass.js"></script>
</body>

</html>
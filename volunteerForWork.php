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

  <title>Work As A Volunteer</title>

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
      <small>Volunteer For Work</small>
      
    </h1>

    

    <!-- Intro Content -->
    <div class="row">
      
      <div class="col-lg-6">

        <h2>Volunteer For Work</h2>
        <p>Please fill the accompanying form and we will assign you work based on work availability </p>
      </div>
      <div class="col-lg-6">
        <!--form-->
          <form class="form-horizontal addVolunteer" id="form">
            <input type="hidden" name="f_id" value="<?php echo $userDetails['user_id']?>">
            
                
         
                <!-- full-name input-->
                <div class="control-group">
                    <label class="control-label">Full Name*</label>
                    <div class="controls">
                        <input id="full-name" name="f_fullname" type="text" placeholder="full name"
                        class="input-xlarge">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Gender*</label>
                    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="f_gender" id="inlineRadio1" value="Male">
  <label class="form-check-label" for="inlineRadio1">Male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="f_gender" id="inlineRadio2" value="Female">
  <label class="form-check-label" for="inlineRadio2">Female</label>
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
                    <label class="control-label">Interests*</label>
                    <div class="controls">
                        <input id="city" name="f_interests" type="text" placeholder="Your interests" class="input-xlarge">
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">skills*</label>
                    <div class="controls">
                        <input id="city" name="f_skills" type="text" placeholder="Your skills" class="input-xlarge">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">From Date*</label>
                    <div class="controls">
                        <input id="city" name="f_fromdate" type="date" placeholder="From date" class="input-xlarge">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">To Date*</label>
                    <div class="controls">
                        <input id="city" name="f_todate" type="date" placeholder="To date" class="input-xlarge">
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

              $querySubmitsByUser = $con->prepare("SELECT * FROM volunteers WHERE userid = :id");
              $querySubmitsByUser->bindParam("id",$userDetails['user_id']);
              if($querySubmitsByUser->execute()){


                if($querySubmitsByUser->rowCount()==0){
   echo '<p>You have not summitted any query related to this service</p>';

   
  }else{
                echo '<table class="table"><tr>
    <th>Submitted on</th>
    <th>Status</th>
  </tr>';
                    while ($row = $querySubmitsByUser->fetch(PDO::FETCH_ASSOC)) {
                          echo '<tr><td>'.$row['timesubmitted'].'</td><td>'.$row['status'].'</td></tr>';
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
  <script src="assets/js/addVolunteer.js"></script>
</body>

</html>
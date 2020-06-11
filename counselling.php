<?php
 
  define('__CONFIG__',true);

  require_once("include/config.php");




  if(isset($_POST['f_id'])){

              $querySubmitsByUser = $con->prepare("SELECT * FROM counsellings WHERE userid = :id");
              $querySubmitsByUser->bindParam("id",$_POST['f_id']);
              if($querySubmitsByUser->execute()){


                if($querySubmitsByUser->rowCount()==0){
   $str = '<p>You have not summitted any query related to this service</p>';

   
  }else{
                $str= '<table class="table"><tr>
    <th>Submitted on</th>
    <th>Status</th>
  </tr>';
                    while ($row = $querySubmitsByUser->fetch(PDO::FETCH_ASSOC)) {
                          $str.= '<tr><td>'.$row['timesubmitted'].'</td><td>'.$row['status'].'</td></tr>';
    }
    $str.='</table>';
  }
}

echo $str;exit;
 }

  
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

  <title>Appoint a counselling session</title>

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
      <small>Appoint a counselling session</small>
      
    </h1>

    

    <!-- Intro Content -->
    <div class="row">
      
      <div class="col-lg-6">

        <h2>Appoint a counselling session</h2>
        <p>Please fill the accompanying form and we will appoint a session with a counseller </p>
      </div>
      <div class="col-lg-6">
        <!--form-->
          <form class="form-horizontal counselling" id="form">
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
                    <label class="control-label">District*</label>
                    <div class="controls">
                        <select id="district" name="f_district" class="input-xlarge">
                            
<?php require_once("districtList.php");?>

                        </select>
                    </div>
                </div>
                
                
                
                
                


                
                <div class="control-group">
                    <label class="control-label">Date*</label>
                    <div class="controls">
                        <input id="city" name="f_cdate" type="date" placeholder="From date" class="input-xlarge">
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
      
      <div class="col-lg-6" >
        <h2>Status</h2>
        <div id="status">
          
        </div>

        
      </div>
      
    </div>
    

    

  </div>
  <!-- /.container -->

<?php require_once("footer.php") ?>

  <!-- Bootstrap core JavaScript -->

  
  <script src="assets/js/jquery-3.3.1.js"></script>
  
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/addCounselling.js"></script>
</body>

</html>
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

  <title>Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/modern-business.css" rel="stylesheet">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['District', 'food supply requests', 'Essential pass requests','personal pass requests', 'Volunteering Requests', 'Relief Donation request'],

          <?php
              $stmt1 = $con->prepare("SELECT * FROM districtwisedata");
              if ($stmt1->execute()) {
              while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
              ?>
              ['<?php echo $row['district_name'];?>',<?php echo $row['foodsupply'];?>,
              <?php echo $row['essentialpass'];?>,<?php echo $row['personalpass'];?>,
              <?php echo $row['volunteers'];?>,<?php echo $row['donatereliefmaterials'];?>
              ],



              <?php
    }
}
          ?>

        ]);

        var options = {

          chart: {
            title: 'Districtwise other requests recieved',

          },
          bars: 'horizontal', // Required for Material Bar Charts.
          bar:{groupWidth:200},
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }


 </script>

 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['District', 'Doctor Appointments', 'Hospital Admissions','Patient Symptom Data', 'Counselling Requests'],

          <?php
              $stmt1 = $con->prepare("SELECT * FROM districtwisedata");
              if ($stmt1->execute()) {
              while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
              ?>
              ['<?php echo $row['district_name'];?>',<?php echo $row['doctorappointments'];?>,
              <?php echo $row['hospitaladmissions'];?>,<?php echo $row['patientsymptomdata'];?>,<?php echo $row['counsellings'];?>

              ],



              <?php
    }
}
          ?>

        ]);

        var options = {

          chart: {
            title: 'Districtwise Medical Requests',

          },
          bars: 'horizontal', // Required for Material Bar Charts.
          bar:{groupWidth:200},
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material2'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }


 </script>
 

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
        <h2>Admin Dashboard</h2>



      </div>
      
    </div>
    <!-- /.row -->
    <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Registered Users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php
                                              $sql = "SELECT count(*) FROM users "; 
$result = $con->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); echo "Total ".$number_of_rows;
                                        ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Cases of Food Supply</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php
                                              $sql = "SELECT count(*) FROM foodsupplyaddresses "; 
$result = $con->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); echo "Total ".$number_of_rows;
                                        ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Cases of Essential Pass</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php
                                              $sql = "SELECT count(*) FROM essentialpass "; 
$result = $con->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); echo "Total ".$number_of_rows;
                                        ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Cases of Personal Pass</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php
                                              $sql = "SELECT count(*) FROM personalpass "; 
$result = $con->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); echo "Total ".$number_of_rows;
                                        ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


<div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Voulunteering Requests</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php
                                              $sql = "SELECT count(*) FROM volunteers "; 
$result = $con->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); echo "Total ".$number_of_rows;
                                        ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>


                                
                            </div>




                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Doctor Appointments</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php
                                              $sql = "SELECT count(*) FROM doctorappointments "; 
$result = $con->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); echo "Total ".$number_of_rows;
                                        ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Hospital Admissions</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php
                                              $sql = "SELECT count(*) FROM hospitaladmissions "; 
$result = $con->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); echo "Total ".$number_of_rows;
                                        ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Patient symptom data</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php
                                              $sql = "SELECT count(*) FROM patientsymptomdata "; 
$result = $con->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); echo "Total ".$number_of_rows;
                                        ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Counselling Requests</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php
                                              $sql = "SELECT count(*) FROM counsellings "; 
$result = $con->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); echo "Total ".$number_of_rows;
                                        ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Relief Donation Requests</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php
                                              $sql = "SELECT count(*) FROM donatereliefmaterials "; 
$result = $con->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); echo "Total ".$number_of_rows;
                                        ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

    <div class="row">
      <div class="col-lg-12 col-md-6" style="overflow-x:auto">

        <div id="barchart_material2" style="width: 900px; height: 500px;"></div>





      </div>
      <div class="col-lg-12 col-md-6">

        </div>
    </div>


        <div class="row">
      <div class="col-lg-12 col-md-6" style="overflow-x:auto">

        <div id="barchart_material" style="width: 900px; height: 500px;"></div>





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
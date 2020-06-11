<!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
     <a class="navbar-brand" href="dashboard.php"> <img src="../assets/images/Assammap.jpg" class="img-responsive rounded circle" alt="Responsive image" width="50px" height ="50px"> Assam </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="tollfreenumbers.php" class="nav-link">Toll Free Numbers |</a></li>
           <li class="nav-item"><a href="donate.php" class="nav-link">Add Donatation Details |</a></li>
           <li class="nav-item"><a href="createemployee.php" class="nav-link">Create Employee |</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Services
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              
              <a class="dropdown-item" href="foodSupply.php">Food Supply For Isolated Patients</a>
              <a class="dropdown-item" href="essentialPass.php">Essential Vehicle Pass</a>
              <a class="dropdown-item" href="personalPass.php">Personal Pass</a>
              <a class="dropdown-item" href="volunteers.php">Volunteers</a>
              <a class="dropdown-item" href="doctorappointments.php">Doctor Appointment Requests</a>
              <a class="dropdown-item" href="hospitaladmissions.php">Hospital Admissions Requests</a>
              <a class="dropdown-item" href="patientSymptomdata.php">Patient Symptom Data</a>
              <a class="dropdown-item" href="counsellings.php">Counselling Requests</a>
              <a class="dropdown-item" href="donatereliefmaterials.php">Relief Materials Requests</a>
              
              
            </div>
          </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $userDetails['username']?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              
              <a class="dropdown-item" href="logout.php">Logout</a>
              
              
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
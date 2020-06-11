<?php
	//define the config
	define('__CONFIG__',true);
	//allow the config file
	require_once("../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$result = [];

		$f_id = $_POST['f_id']; 
		$f_fullname = $_POST['f_fullname']; 
		$f_gender = $_POST['f_gender'];
		
		$f_district = $_POST['f_district'];
		
		$f_phoneno = $_POST['f_phoneno']; 
		 
		 
		$f_dept = $_POST['f_dept']; 
		$f_date = $_POST['f_date']; 
		
		


		

		

			$datalist = array(':userid' => $f_id, ':fullname' => $f_fullname,':gender'=>$f_gender, ':phoneno'=>$f_phoneno,':district'=>$f_district
				, ':dept'=>$f_dept, ':adate'=>$f_date);

			$addquery = $con->prepare("INSERT INTO doctorappointments ( userid, fullname, gender, district ,  phone, dept, appointmentdate ) values (:userid, :fullname, :gender,:district,:phoneno, :dept, :adate)");
			$addquery->execute($datalist);

			function updateDistrictData($con,$serviceName, $districtName){
				$updateDistrictData = $con->prepare("UPDATE districtwisedata SET $serviceName=$serviceName+1  WHERE district_name = :dname");
			$updateDistrictData->bindParam("dname",$districtName);
			$updateDistrictData->execute();
			}
			
			updateDistrictData($con,"doctorappointments",$f_district);
			
			$result['success'] ='Your query is submitted';
			
		


		
	
	

	echo json_encode($result,JSON_PRETTY_PRINT);exit;


	}else{
		//die kill the script or redirect the user
		exit('exited');
	}

?>
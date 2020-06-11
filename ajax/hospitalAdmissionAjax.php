<?php
	//define the config
	define('__CONFIG__',true);
	//allow the config file
	require_once("../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$result = [];

		$f_id = $_POST['f_id']; 
		$f_fullname = $_POST['f_fullname'];
		$f_age = $_POST['f_age'];
		$f_gender = $_POST['f_gender']; 
		$f_address = $_POST['f_address']; 
		
		$f_city = $_POST['f_city'];  
		$f_district = $_POST['f_district']; 
		$f_pincode = $_POST['f_pincode']; 
		$f_phoneno = $_POST['f_phoneno']; 
		
		$f_kinname = $_POST['f_kinname'];  
		$f_admdate = $_POST['f_admdate']; 
		


		

		

			$datalist = array($f_id, $f_fullname, $f_age, $f_gender, $f_address, $f_city,$f_district, $f_pincode, $f_phoneno , $f_kinname, $f_admdate);
			$addquery = $con->prepare("INSERT INTO hospitaladmissions ( userid, fullname, age , gender, address, city, district, pincode, phoneno, kinname, admdate ) values (?,?,?,?,?,?,?,?,?,?,?)");
			$addquery->execute($datalist);

			function updateDistrictData($con,$serviceName, $districtName){
				$updateDistrictData = $con->prepare("UPDATE districtwisedata SET $serviceName=$serviceName+1  WHERE district_name = :dname");
			$updateDistrictData->bindParam("dname",$districtName);
			$updateDistrictData->execute();
			}
			
			updateDistrictData($con,"hospitaladmissions",$f_district);
			
			$result['success'] ='Your query is submitted';
			
		


		
	
	

	echo json_encode($result,JSON_PRETTY_PRINT);exit;


	}else{
		//die kill the script or redirect the user
		exit('exited');
	}

?>
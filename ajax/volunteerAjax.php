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
		$f_address = $_POST['f_address']; 
		$f_district = $_POST['f_district'];
		$f_city = $_POST['f_city'];  
		$f_pincode = $_POST['f_pincode']; 
		$f_phoneno = $_POST['f_phoneno']; 
		 
		$f_interests = $_POST['f_interests'];  
		$f_skills = $_POST['f_skills']; 
		$f_todate = $_POST['f_todate']; 
		$f_fromdate = $_POST['f_fromdate'];
		


		

		

			$datalist = array(':userid' => $f_id, ':fullname' => $f_fullname,':gender'=>$f_gender, ':address'=> $f_address, ':city'=>$f_city,':pincode'=>$f_pincode,':phoneno'=>$f_phoneno,':district'=>$f_district, ':interests'=>$f_interests
				, ':skills'=>$f_skills, ':tod'=>$f_todate, ':fromd'=>$f_fromdate);

			$addquery = $con->prepare("INSERT INTO volunteers ( userid, fullname, gender, address , city, district, pincode, phone, interests, skills, fromdate, todate ) values (:userid, :fullname, :gender, :address, :city, :district, :pincode, :phoneno, :interests, :skills, :fromd, :tod)");
			$addquery->execute($datalist);

			function updateDistrictData($con,$serviceName, $districtName){
				$updateDistrictData = $con->prepare("UPDATE districtwisedata SET $serviceName=$serviceName+1  WHERE district_name = :dname");
			$updateDistrictData->bindParam("dname",$districtName);
			$updateDistrictData->execute();
			}
			
			updateDistrictData($con,"volunteers",$f_district);
			
			$result['success'] ='Your query is submitted';
			
		


		
	
	

	echo json_encode($result,JSON_PRETTY_PRINT);exit;


	}else{
		//die kill the script or redirect the user
		exit('exited');
	}

?>
<?php
	//define the config
	define('__CONFIG__',true);
	//allow the config file
	require_once("../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$result = [];

		$f_id = $_POST['f_id']; 
		$f_fullname = $_POST['f_fullname']; 
		$f_address1 = $_POST['f_address1']; 
		$f_address2 = $_POST['f_address2']; 
		$f_city = $_POST['f_city'];  
		$f_pincode = $_POST['f_pincode']; 
		$f_phoneno = $_POST['f_phoneno']; 
		$f_district = $_POST['f_district']; 


		

		

			$datalist = array(':user_id' => $f_id, ':fullname' => $f_fullname, ':address1'=> $f_address1, ':address2'=>$f_address2,':city'=>$f_city,':pincode'=>$f_pincode,':phoneno'=>$f_phoneno,':district'=>$f_district);
			$addquery = $con->prepare("INSERT INTO foodsupplyaddresses ( user_id, fullname, address1, address2, city, district, pincode, phoneno) values (:user_id, :fullname, :address1, :address2, :city, :district, :pincode, :phoneno)");
			$addquery->execute($datalist);

			function updateDistrictData($con,$serviceName, $districtName){
				$updateDistrictData = $con->prepare("UPDATE districtwisedata SET $serviceName=$serviceName+1  WHERE district_name = :dname");
			$updateDistrictData->bindParam("dname",$districtName);
			$updateDistrictData->execute();
			}
			
			updateDistrictData($con,"foodsupply",$f_district);
			
			$result['success'] ='Your query is submitted';
			
		


		
	
	

	echo json_encode($result,JSON_PRETTY_PRINT);exit;


	}else{
		//die kill the script or redirect the user
		exit('exited');
	}

?> 
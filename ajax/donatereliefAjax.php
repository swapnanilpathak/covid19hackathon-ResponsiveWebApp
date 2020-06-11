<?php
	//define the config
	define('__CONFIG__',true);
	//allow the config file
	require_once("../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$result = [];

		$f_id = $_POST['f_id']; 
		$f_fullname = $_POST['f_fullname']; 
		$f_address = $_POST['f_address']; 
		
		  
		$f_pincode = $_POST['f_pincode']; 
		$f_phoneno = $_POST['f_phoneno']; 
		$f_district = $_POST['f_district']; 
		$f_donationtype = $_POST['f_donationtype'];  
		$f_quantity = $_POST['f_quantity']; 
		 


		

		

			$datalist = array($f_id , 
		$f_fullname ,
		$f_address ,
		
		$f_district ,
		$f_pincode , 
		$f_phoneno ,
		
		$f_donationtype ,
		$f_quantity );
			$addquery = $con->prepare("INSERT INTO `donatereliefmaterials`( `userid`, `fullname`, `address`, `district`, `pincode`, `phoneno`, `donationtype`, `quantity`) values (?,
?,
?,
?,
?,
?,
?,
?)");
			$addquery->execute($datalist);

			function updateDistrictData($con,$serviceName, $districtName){
				$updateDistrictData = $con->prepare("UPDATE districtwisedata SET $serviceName=$serviceName+1  WHERE district_name = :dname");
			$updateDistrictData->bindParam("dname",$districtName);
			$updateDistrictData->execute();
			}
			
			updateDistrictData($con,"donatereliefmaterials",$f_district);
			
			$result['success'] ='Your query is submitted';
			
		


		
	
	

	echo json_encode($result,JSON_PRETTY_PRINT);exit;


	}else{
		//die kill the script or redirect the user
		exit('exited');
	}

?>
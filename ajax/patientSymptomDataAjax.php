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
		
		$f_district = $_POST['f_district']; 
		$f_pincode = $_POST['f_pincode']; 
		$f_phoneno = $_POST['f_phoneno']; 
		
		$f_f = $_POST['f_f'];
		$f_c = $_POST['f_c'];
		$f_rd = $_POST['f_rd'];
		$f_travelhistory= $_POST['f_travelhistory'];


		

		

			$datalist = array($f_id , 
		$f_fullname ,
		$f_address ,
		
		$f_district ,
		$f_pincode , 
		$f_phoneno ,
		
		$f_f ,
		$f_c ,
		$f_rd ,
		$f_travelhistory);
			$addquery = $con->prepare("INSERT INTO patientsymptomdata (  `userid`, `fullname`, `address`, `district`, `pincode`, `phoneno`, `fever`, `cough`, `respiratorydistress`, `travelhistory` ) values (?,
?,
?,
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
			
			updateDistrictData($con,"patientsymptomdata",$f_district);
			
			$result['success'] ='Your query is submitted';
			
		


		
	
	

	echo json_encode($result,JSON_PRETTY_PRINT);exit;


	}else{
		//die kill the script or redirect the user
		exit('exited');
	}

?>
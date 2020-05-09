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
		
		$f_city = $_POST['f_city'];  
		$f_pincode = $_POST['f_pincode']; 
		$f_phoneno = $_POST['f_phoneno']; 
		$f_district = $_POST['f_district']; 
		$f_reason = $_POST['f_reason'];  
		$f_vregdno = $_POST['f_vregdno']; 
		$f_tod = $_POST['f_tod']; 
		$f_fromd = $_POST['f_fromd'];
		$f_destination = $_POST['f_destination']; 


		

		

			$datalist = array(':userid' => $f_id, ':fullname' => $f_fullname, ':address'=> $f_address, ':city'=>$f_city,':pincode'=>$f_pincode,':phoneno'=>$f_phoneno,':district'=>$f_district, ':reason'=>$f_reason
				, ':vregdno'=>$f_vregdno, ':tod'=>$f_tod, ':fromd'=>$f_fromd,':dest'=>$f_destination);
			$addquery = $con->prepare("INSERT INTO essentialpass ( userid, fullname, address , city, district, pincode, phoneno, reason, vregdno, fromdate, todate, destination ) values (:userid, :fullname, :address, :city, :district, :pincode, :phoneno, :reason, :vregdno, :fromd, :tod, :dest)");
			$addquery->execute($datalist);
			
			$result['success'] ='Your query is submitted';
			
		


		
	
	

	echo json_encode($result,JSON_PRETTY_PRINT);exit;


	}else{
		//die kill the script or redirect the user
		exit('exited');
	}

?>  
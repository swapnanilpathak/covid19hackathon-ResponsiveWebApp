<?php
	//define the config
	define('__CONFIG__',true);
	//allow the config file
	require_once("../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$result = [];

		$f_msmeid = (int)$_POST['f_msmeid']; 
		$f_userid = (int)$_POST['f_userid'];
		$f_productid = (int)$_POST['f_productid']; 
		$f_quantity = (int)$_POST['f_quantity'];
		$f_fullname = $_POST['f_fullname'];
		
		$f_address = $_POST['f_address']; 
		
		
		$f_district = $_POST['f_district']; 
		$f_pincode = $_POST['f_pincode']; 
		$f_phoneno = $_POST['f_phoneno']; 
		
		  
		 
		


		

		

			$datalist = array($f_msmeid, $f_userid,$f_productid, $f_quantity, $f_fullname, $f_address,$f_district, $f_pincode, $f_phoneno );
			$addquery = $con->prepare("INSERT INTO  msmeorders ( msmeid, userid, productid, quantity, fullname, address, district, pincode, phoneno) values (?,?,?,?,?,?,?,?,?)");
			$addquery->execute($datalist);

			
			
			
			
			$result['success'] ='Your order is placed <a href="buymsmeproducts.php">Click Here</a> to browse more products';
			
		


		
	
	

	echo json_encode($result,JSON_PRETTY_PRINT);exit;


	}else{
		//die kill the script or redirect the user
		exit('exited');
	}

?>
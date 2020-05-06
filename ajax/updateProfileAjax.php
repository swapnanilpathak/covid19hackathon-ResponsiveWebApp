<?php
	//define the config
	define('__CONFIG__',true);
	//allow the config file
	require_once("../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		$result=[];
		
		$f_id = Filter::String($_POST['f_id']);
		$f_fullname = Filter::String($_POST['f_fullname']);
		$f_phone = Filter::String($_POST['f_phone']);
		

		$updateProfile = $con->prepare("UPDATE users SET  user_fullname=:fullname, user_phoneno=:phone WHERE user_id = :id");
		$updateProfile->bindValue('id',$f_id);
		
		$updateProfile->bindValue('fullname',$f_fullname);
		
		$updateProfile->bindValue('phone',$f_phone);
		$updateProfile->execute();

		$getNewProfile = $con->prepare("SELECT user_fullname, user_phoneno FROM users WHERE user_id = :id");
		$getNewProfile->bindValue('id',$f_id);
		$getNewProfile->execute();
		$newProfile = $getNewProfile->fetch(PDO::FETCH_ASSOC);

		$result['phone'] = $newProfile['user_phoneno'];
		$result['fullname'] = $newProfile['user_fullname'];
		$result['message'] = "profile updated successfully";


		echo json_encode($result,JSON_PRETTY_PRINT);exit;
	}else{
		//die kill the script or redirect the user
		exit('exited');
	}


?>
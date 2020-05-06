<?php
	//define the config
	define('__CONFIG__',true);
	//allow the config file
	require_once("../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		$result=[];
		//$f_id = $_SESSION['id'];
		$f_id = $_POST['f_id'];
		$f_oldpassword = (string)$_POST['f_oldpassword'];
		$f_newpassword1 = (string)$_POST['f_newpassword1'];
		$f_newpassword2 = (string)$_POST['f_newpassword2'];
		$getOldPassword = $con->prepare("SELECT user_password FROM users where user_id = :id");
		$getOldPassword->bindValue("id",$f_id);
		$getOldPassword->execute();
		$oldPassword = $getOldPassword->fetch(PDO::FETCH_ASSOC);
		$oldPassword=$oldPassword['user_password'];
		
		if(password_verify($f_oldpassword,$oldPassword)){
			if(strcmp($f_newpassword1,$f_newpassword2)===0){

				$newPassword = password_hash($f_newpassword1,PASSWORD_DEFAULT);
				$updateNewPassword = $con->prepare("UPDATE users SET user_password = :password WHERE user_id = :id");
				$updateNewPassword->bindValue("password",$newPassword);
				$updateNewPassword->bindValue("id",$f_id);
				$updateNewPassword->execute();
				$result['error'] = "Password Updated";

			}else{
				$result['error'] = "New password not matching Confirm password";
			}

		}else{
			$result['error'] = "Your old password is incorrect";
		}


		echo json_encode($result,JSON_PRETTY_PRINT);exit;
	}else{
		//die kill the script or redirect the user
		exit('exited');
	}


?>
<?php
	
	define('__CONFIG__',true);
	
	require_once("../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$result = [];

	
		$phpf_username = Filter::String($_POST['f_username']);

	
		$findUser = $con->prepare("SELECT id FROM msmes WHERE username = LOWER(:user_f_username) LIMIT 1");
		$findUser->bindParam(':user_f_username',$phpf_username, PDO::PARAM_STR);
		$findUser->execute();


		if($findUser->rowCount()==1){
			
			$result['error']='Account attached with this username already exists';
			$result['is_logged_in'] = false;
		}else{

			
			$phpf_username = Filter::String($_POST['f_username']);
			$phpf_district = $_POST['f_district'];
			$phpPassword1 = $_POST['f_password1'];
			$phpPassword2 = $_POST['f_password2'];

			if(strcmp($phpPassword1,$phpPassword2)===0){
			$phpPassword1 = password_hash($_POST['f_password1'], PASSWORD_DEFAULT);
			$addUser = $con->prepare("INSERT INTO msmes(username,password,district)VALUES(LOWER(:f_username),:password, :district)");
			$addUser->bindParam(':f_username',$phpf_username,PDO::PARAM_STR);

			$addUser->bindParam(':district',$phpf_district,PDO::PARAM_STR);
			
			$addUser->bindParam(':password',$phpPassword1,PDO::PARAM_STR);
			
			$addUser->execute();


			$user_id = $con->lastInsertId();

			$_SESSION['user_id']= (int)$user_id;
			$_SESSION['user_type'] = "msme";
			$result['redirect'] = '/msmeDashboard.php';
			$result['is_logged_in'] = true;

			}
			else{
				$return['error']='Passwords are not matching';
			}
			
		}
	

	echo json_encode($result,JSON_PRETTY_PRINT);exit;


	}else{
		
		exit('exited');
	}

?>  
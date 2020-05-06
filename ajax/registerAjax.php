<?php
	
	define('__CONFIG__',true);
	
	require_once("../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$result = [];

	
		$phpEmail = Filter::String($_POST['email']);

	
		$findUser = $con->prepare("SELECT user_id FROM users WHERE user_email = LOWER(:user_email) LIMIT 1");
		$findUser->bindParam(':user_email',$phpEmail, PDO::PARAM_STR);
		$findUser->execute();


		if($findUser->rowCount()==1){
			
			$result['error']='Account attached with this email already exists';
			$result['is_logged_in'] = false;
		}else{

			
			$phpEmail = Filter::String($_POST['email']);
			$phpPassword1 = $_POST['password1'];
			$phpPassword2 = $_POST['password2'];

			if(strcmp($phpPassword1,$phpPassword2)===0){
			$phpPassword1 = password_hash($_POST['password1'], PASSWORD_DEFAULT);
			$addUser = $con->prepare("INSERT INTO users(user_email,user_password)VALUES(LOWER(:email),:password)");
			$addUser->bindParam(':email',$phpEmail,PDO::PARAM_STR);
			
			$addUser->bindParam(':password',$phpPassword1,PDO::PARAM_STR);
			
			$addUser->execute();


			$user_id = $con->lastInsertId();

			$_SESSION['user_id']= (int)$user_id;

			$result['redirect'] = '/covid19hackathon/index.php';
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
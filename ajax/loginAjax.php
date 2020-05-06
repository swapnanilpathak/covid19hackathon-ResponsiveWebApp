<?php
	
	define('__CONFIG__',true);

	require_once("../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$result = [];

	
		$phpEmail = Filter::String($_POST['email']);
		$phpPassword = $_POST['password'];


		$findUser = $con->prepare("SELECT user_id, user_password FROM users WHERE user_email = LOWER(:user_email) LIMIT 1");
		$findUser->bindParam(':user_email',$phpEmail, PDO::PARAM_STR);
		$findUser->execute();


		if($findUser->rowCount()==1){
			
			$user = $findUser->fetch(PDO::FETCH_ASSOC);
			$userId=(int)$user['user_id'];
			$hashedPassword = (string)$user['user_password'];
			

			if(password_verify($phpPassword,$hashedPassword)){
				
				$result['redirect'] ='/covid19hackathon/index.php';
				
				$_SESSION['user_id']= $userId;
				


			}else{
				
				$result['error']="Invalid Password";
			}
			
		}else{

			
			$result['error']="You have to create a registered account";
		}
	

	echo json_encode($result,JSON_PRETTY_PRINT);exit;


	}else{
		
		exit('exited');
	}

?>  
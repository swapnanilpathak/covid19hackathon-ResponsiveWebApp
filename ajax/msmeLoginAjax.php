<?php
	
	define('__CONFIG__',true);

	require_once("../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$result = [];

	
		$phpEmail = Filter::String($_POST['email']);
		$phpPassword = $_POST['password'];


		$findUser = $con->prepare("SELECT * FROM msmes WHERE username = LOWER(:username) LIMIT 1");
		$findUser->bindParam(':username',$phpEmail, PDO::PARAM_STR);
		$findUser->execute();


		if($findUser->rowCount()==1){
			
			$user = $findUser->fetch(PDO::FETCH_ASSOC);
			$userId=(int)$user['id'];
			$hashedPassword = (string)$user['password'];
			

			if(password_verify($phpPassword,$hashedPassword)){
				
				$result['redirect'] ='/msmeDashboard.php';
				
				$_SESSION['user_id']= $userId;
				$_SESSION['user_type'] ="msme";
				


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
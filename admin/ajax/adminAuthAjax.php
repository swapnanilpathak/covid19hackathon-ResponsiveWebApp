<?php
	
	define('__CONFIG__',true);

	require_once("../../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$result = [];

	
		$adminUsername = Filter::String($_POST['adminusername']);
		$adminPassword = $_POST['adminpassword'];


		$findUser = $con->prepare("SELECT id, username, password FROM adminusers WHERE username = :username LIMIT 1");
		$findUser->bindParam(':username',$adminUsername, PDO::PARAM_STR);
		$findUser->execute();
		

		if($findUser->rowCount()==1){
			
			$user = $findUser->fetch(PDO::FETCH_ASSOC);
			$userId=(int)$user['id'];
			$hashedPassword = (string)$user['password'];
			

			if(password_verify($adminPassword,$hashedPassword)){
				
				$result['redirect'] ='/admin/dashboard.php';
				
				$_SESSION['id']= $userId;
				


			}else{
				
				$result['error']="Invalid Password";
			}
			
		}else{

			
			$result['error']="You are not an admin";
			
		}
	

	echo json_encode($result,JSON_PRETTY_PRINT);exit;


	}else{
		
		exit('exited');
	}

?>  
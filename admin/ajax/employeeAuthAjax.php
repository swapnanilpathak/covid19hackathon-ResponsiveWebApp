<?php
	
	define('__CONFIG__',true);

	require_once("../../include/config.php");

	


	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$result = [];

	
		$employeeUsername = Filter::String($_POST['employeeusername']);
		$employeePassword = $_POST['employeepassword'];


		$findUser = $con->prepare("SELECT * FROM employees WHERE username = :username LIMIT 1");
		$findUser->bindParam(':username',$employeeUsername, PDO::PARAM_STR);
		$findUser->execute();
		

		if($findUser->rowCount()==1){
			
			$user = $findUser->fetch(PDO::FETCH_ASSOC);
			$userId=(int)$user['id'];
			$hashedPassword = (string)$user['password'];
			

			if(password_verify($employeePassword,$hashedPassword)){

				if($user['dept']=='foodsupplyservices'){
					$result['redirect'] ='/admin/foodSupplyEmployeeDashboard.php';
				
				$_SESSION['id']= $userId;
				}
				else if($user['dept']=='transportservices'){
					$result['redirect'] ='/admin/transportServicesEmployeeDashboard.php';
				
				$_SESSION['id']= $userId;
				}
				else if($user['dept']=='medicalservices'){
					$result['redirect'] ='/admin/medicalEmployeeDashboard.php';
				
				$_SESSION['id']= $userId;
				}
				
				


			}else{
				
				$result['error']="Invalid Password";
			}
			
		}else{

			
			$result['error']="You are not an employee";
			
		}
	

	echo json_encode($result,JSON_PRETTY_PRINT);exit;


	}else{
		
		exit('exited');
	}

?>  
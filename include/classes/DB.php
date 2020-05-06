<?php

//if there is no constant defined called __CONFIG__; then dont load this config.php file
	if(!defined("__CONFIG__")){//if the config doesnot exist do this
		exit("You cannot view this due to technical reasons");//redirect to another page if config not found or show 404 message
		//after exit nothing is rendered
	}



	class DB{//class declaration
		protected static $connection;//variable to store the connection


		private function __construct(){//constructor

			try{
				self::$connection = new PDO('mysql:charset=utf8mb4;host=localhost;port=3306;dbname=covid19hackathon','root','');
				self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$connection->setAttribute(PDO::ATTR_PERSISTENT,false);
			}catch(PDOException $e){
				echo "Could not connect to database";
				exit;
			}

		}

		public static function getConnection(){//function to acces the connection outside the DB.php file
			if(!self::$connection){
				new DB();
			}
			return self::$connection;//return the connection
		}
	}
?>
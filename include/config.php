<?php
	//if there is no constant defined called __CONFIG__; then dont load this config.php file
	if(!defined("__CONFIG__")){//if the config doesnot exist do this
		exit("You cannot view this due to technical reasons");//redirect to another page if config not found or show 404 message
		//after exit nothing is rendered
	}

	//Sessions are always turned on
	if(!isset($_SESSION)){
		session_start();
	}
	//allow errors
	error_reporting(-1);
	ini_set('display_errors','ON');



	//include the DB.php file
	include_once("classes/DB.php");
	include_once("classes/Filter.php");
	include_once("functions.php");

	$con = DB::getConnection();
?>
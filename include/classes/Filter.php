<?php

//if there is no constant defined called __CONFIG__; then dont load this config.php file
	if(!defined("__CONFIG__")){//if the config doesnot exist do this
		exit("You cannot view this due to technical reasons");//redirect to another page if config not found or show 404 message
		//after exit nothing is rendered
	}

	class Filter 
{
	
	/**
	 *  @param	string	$string		String to filter before putting inside InnoDB
	 *  @return            			Filters and returns a valid string to put into the Database.
	 *  @note				If the $html arg is false, new lines (\n) will replaced with __BR__ and re-converted to \r\n afterwards.
	 * 					.. This is to ensure new lines are kept in place.
	 */
	public static function String( $string, $html = false ) {
		if(!$html) {
			
			$string = filter_var( $string , FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
			
		} else {
			$string = filter_var( $string , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			
		}
		return $string;
	}
	
	/**
	 *  @param	string	$email		Email to filter before putting inside InnoDB
	 *  @return            			Filters and returns a valid or invalid email address
	 */
	public static function Email( $email ) {
		return filter_var( $email , FILTER_SANITIZE_EMAIL);
	}
	
	/**
	 *  @param	string	$url		String to filter before putting inside InnoDB
	 *  @return            			Filters and returns a valid or invalid URL
	 */
	public static function URL( $url ) {
		return filter_var( $url , FILTER_SANITIZE_URL);
	}
	
	/**
	 *  @param	int		$integer	The string to filter and turn into an integer 
	 *  @return	int					Returns an integer after being filtered. 
	 */
	public static function Int( $integer ) {
		return (int) $integer = filter_var( $integer , FILTER_SANITIZE_NUMBER_INT);
	}
}
	



?>
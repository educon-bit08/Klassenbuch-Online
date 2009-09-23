<?php

class UserInformException extends Exception {
	
	public static $userinfos = array(); 	

	public function __construct($message = '') {
		
		$this->userinfos[] = $message;
		
	}
	
	public function setUserinfos($info){
		$this->userinfos[] = $info;
	}
	
}

?>
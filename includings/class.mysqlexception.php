<?php

class MysqlException extends Exception {
	
	public function __construct($message = false, $code = false) {
		
		if (!$message) {
			$this->message = mysql_error();
		}
		if (!$code) {
			$this->code = mysql_errno();
		}
		
	}
	
}

?>
<?php

namespace PhpPlatform\Errors;

use PhpPlatform\Errors\Exceptions\Application\ProgrammingError;
use PhpPlatform\Errors\Exceptions\Application\Warning;

final class ErrorHandler {
	
	static function handleError( $severity , $message , $errfile = null, $errline = null, array $errcontext = null ){
		$errorException = new \ErrorException($message,0,$severity,$errfile,$errline);
		switch ($severity){
			case E_ERROR:
  		    case E_PARSE:
			case E_CORE_ERROR:
			case E_COMPILE_ERROR:
			case E_USER_ERROR:
			case E_RECOVERABLE_ERROR:
				throw new ProgrammingError($message,$errorException);
				break;
			case E_WARNING:
			case E_NOTICE:
			case E_CORE_WARNING:
			case E_COMPILE_WARNING:
			case E_USER_WARNING:
			case E_USER_NOTICE:
			case E_STRICT:
			case E_DEPRECATED:
			case E_USER_DEPRECATED:
				new Warning($message,$errorException);
				break;
			default:
				throw new ProgrammingError($message,$errorException);
		}
		return true;
	}
	
	static function handle(){
		error_reporting(E_ALL); // enable all error reporting
		set_error_handler(array(get_class(),'handleError'));
	}
	
	
}
<?php

namespace PhpPlatform\Errors;


use PhpPlatform\Errors\Exceptions\System\SystemError;
use PhpPlatform\Errors\Exceptions\System\SystemWarning;

/**
 * @todo  solve : autoloader will not load Custom classes within spl_autoload_register
 * see Example 4 in http://php.net/manual/en/language.oop5.autoload.php
 * 
 * any system error or warning will invoke the set_error_handler callback, and if classes SystemError or SystemWarning used in this call back are not loaded, then php will fail to load this classes in callback 
 * 
 * So including these classes manually
 * 
 */
include_once __DIR__.'/Exceptions/System/SystemError.php';
include_once __DIR__.'/Exceptions/System/SystemWarning.php';

final class ErrorHandler {
		
	static function handleError(){
		error_reporting(E_ALL); // enable all error reporting
		ini_set('display_errors', 'false');
		
		set_error_handler(function ( $severity , $message , $errfile = null, $errline = null, array $errcontext = null ){
			switch ($severity){
				case E_ERROR:
	  		    case E_PARSE:
				case E_CORE_ERROR:
				case E_COMPILE_ERROR:
				case E_USER_ERROR:
				case E_RECOVERABLE_ERROR:
					throw new SystemError($message,$severity,$errfile,$errline);
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
					// just log the warning and continue
					new SystemWarning($message,$severity,$errfile,$errline);
					break;
				default:
					throw new SystemError($message,$severity,$errfile,$errline);
			}
			return true;
		});
		
		register_shutdown_function(function(){
			$error = error_get_last();
			if(array_key_exists('lastError', $_ENV) && $_ENV['lastError'] == $error){
				return;
			}
			$_ENV['lastError'] = $error;
			if(is_array($error) && 
					($error["type"] == E_ERROR || $error["type"] == E_PARSE || $error["type"] == E_CORE_ERROR || $error["type"] == E_COMPILE_ERROR)){
				if(ob_get_contents() !== false){
					ob_clean();
				}
				new SystemError($error["message"], $error["type"], $error["file"], $error["line"]);
			}
		});
		
	}
	
	
}
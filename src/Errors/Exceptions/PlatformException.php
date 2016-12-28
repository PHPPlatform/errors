<?php

namespace PhpPlatform\Errors\Exceptions;

use PhpPlatform\Config\Settings;

abstract class PlatformException extends \Exception {
	private static $thisPackageName = "php-platform/errors";
	
	public function __construct($name, $prefix = null, $message = null, $code = null, $previous = null) {
		
		parent::__construct ( $message, $code, $previous );
		
		// logging
		$time = date('Y-m-d H:i:s');
		
		$log    = Settings::getSettings(self::$thisPackageName,"logs.$name");
		if(isset($log)){
			if(!is_dir(dirname($log))){
				mkdir(dirname($log),"0777",true);
			}
			error_log("[$time]".$prefix.$message."\n", 3, $log);
		}
		
		$trace    = Settings::getSettings(self::$thisPackageName,"traces.$name");
		if(isset($trace)){
			if(!is_dir(dirname($trace))){
				mkdir(dirname($trace),"0777",true);
			}
			error_log("[$time]".$prefix."\n".$this->getTraceAsString()."\n-----------------------------\n\n", 3, $trace);
		}
		
	}
}
<?php

namespace PhpPlatform\Errors\Exceptions;

use PhpPlatform\Config\Settings;

abstract class PlatformException extends \Exception {
	private static $thisPackageName = "php-platform/errors";
	
	public function __construct($name, $prefix = null, $message = null, $code = null, $previous = null) {
		
		parent::__construct ( $message, $code, $previous );
		
		// logging
		$time = date('Y-m-d H:i:s');
		$logMessage = "[$time]$prefix ".$this->getLogMessage($this);
		
		$log    = Settings::getSettings(self::$thisPackageName,"logs.$name");
		if(isset($log)){
			if(!is_dir(dirname($log))){
				mkdir(dirname($log),"0777",true);
			}
			error_log("$logMessage\n", 3, $log);
		}
		
		$trace    = Settings::getSettings(self::$thisPackageName,"traces.$name");
		if(isset($trace)){
			if(!is_dir(dirname($trace))){
				mkdir(dirname($trace),"0777",true);
			}
			$causedBy = "";
			$previousException = $this->getPrevious();
			while ($previousException != null){
				$causedBy .= $this->getLogMessage($previousException)."\n";
				$previousException = $previousException->getPrevious();
			}
			if($causedBy != ""){
				$causedBy = "Caused By .... \n".$causedBy;
			}
			
			error_log("$logMessage\n".$this->getTraceAsString()."\n $causedBy -----------------------------\n\n", 3, $trace);
		}
	}
	
	protected function getLogMessage(\Exception $e){
		$message = $e->getMessage();
		$class = get_class($e);
		$file  = $e->getFile();
		$line  = $e->getLine();
		return "$message : $class ($file ($line))";
	}
}
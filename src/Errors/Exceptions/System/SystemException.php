<?php

namespace PhpPlatform\Errors\Exceptions\System;

use PhpPlatform\Errors\Exceptions\PlatformException;

abstract class SystemException extends PlatformException {
	
	protected $severity = null;
	
	public function __construct($message = null, $code = null, $severity = null, $file = null, $line = null, $previous = null) {
		$this->severity = $severity;
		$this->file = $file;
		$this->line = $line;
		parent::__construct ( "System", "[S][".self::friendlyErrorType($severity)."]", $message , $code, $previous );
	}
	
	public function getSeverity(){
		return $this->severity;
	}
	
	private static function friendlyErrorType($type){
		switch($type)
		{
			case E_ERROR: // 1 //
				return 'E_ERROR';
			case E_WARNING: // 2 //
				return 'E_WARNING';
			case E_PARSE: // 4 //
				return 'E_PARSE';
			case E_NOTICE: // 8 //
				return 'E_NOTICE';
			case E_CORE_ERROR: // 16 //
				return 'E_CORE_ERROR';
			case E_CORE_WARNING: // 32 //
				return 'E_CORE_WARNING';
			case E_COMPILE_ERROR: // 64 //
				return 'E_COMPILE_ERROR';
			case E_COMPILE_WARNING: // 128 //
				return 'E_COMPILE_WARNING';
			case E_USER_ERROR: // 256 //
				return 'E_USER_ERROR';
			case E_USER_WARNING: // 512 //
				return 'E_USER_WARNING';
			case E_USER_NOTICE: // 1024 //
				return 'E_USER_NOTICE';
			case E_STRICT: // 2048 //
				return 'E_STRICT';
			case E_RECOVERABLE_ERROR: // 4096 //
				return 'E_RECOVERABLE_ERROR';
			case E_DEPRECATED: // 8192 //
				return 'E_DEPRECATED';
			case E_USER_DEPRECATED: // 16384 //
				return 'E_USER_DEPRECATED';
		}
		return "";
	}
	
}
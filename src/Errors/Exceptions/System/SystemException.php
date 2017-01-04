<?php

namespace PhpPlatform\Errors\Exceptions\System;

use PhpPlatform\Errors\Exceptions\PlatformException;

abstract class SystemException extends PlatformException {
	
	protected $severity = null;
	
	public function __construct($message = null, $code = null, $severity = null, $file = null, $line = null, $previous = null) {
		$this->severity = $severity;
		$this->file = $file;
		$this->line = $line;
		parent::__construct ( "System", "[S][$code]", $message , $code, $previous );
	}
	
	public function getSeverity(){
		return $this->severity;
	}
	
}
<?php

namespace PhpPlatform\Errors\Exceptions\Application;

use PhpPlatform\Errors\Exceptions\PlatformException;

abstract class ApplicationException extends PlatformException {
	public function __construct($message = null, $code = null, $previous = null) {
		parent::__construct ("Application", "[A]", $message , $code , $previous );
	}
}
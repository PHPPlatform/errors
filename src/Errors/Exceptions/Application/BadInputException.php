<?php

namespace PhpPlatform\Errors\Exceptions\Application;

use PhpPlatform\Errors\Exceptions\Application\ApplicationException;

class BadInputException extends ApplicationException {
	public function __construct($message = null, $previous = null) {
		parent::__construct ( $message , 1001, $previous );
	}
}
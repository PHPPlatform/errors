<?php

namespace PhpPlatform\Errors\Exceptions\Application;

use PhpPlatform\Errors\Exceptions\Application\ApplicationException;

class ProgrammingError extends ApplicationException {
	public function __construct($message = null, $previous = null) {
		parent::__construct ( $message , 9999, $previous );
	}
}
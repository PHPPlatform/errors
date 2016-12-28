<?php

namespace PhpPlatform\Errors\Exceptions\Application;

use PhpPlatform\Errors\Exceptions\Application\ApplicationException;

class Warning extends ApplicationException {
	public function __construct($message = null, $previous = null) {
		parent::__construct ( $message = null, 1111, $previous = null );
	}
}
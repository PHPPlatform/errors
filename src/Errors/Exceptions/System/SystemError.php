<?php

namespace PhpPlatform\Errors\Exceptions\System;

class SystemError extends SystemException {
	public function __construct($message = null, $severity = null, $file = null, $line = null, $previous = null) {
		parent::__construct($message, 1, $severity, $file, $line, $previous);
	}
}
<?php

namespace PhpPlatform\Errors\Exceptions\Persistence;

use PhpPlatform\Errors\Exceptions\PlatformException;

abstract class PersistenceException extends PlatformException {
	public function __construct($message = null, $code = null, $previous = null) {
		parent::__construct ("Persistance", "[P]", $message, $code , $previous );
	}
}
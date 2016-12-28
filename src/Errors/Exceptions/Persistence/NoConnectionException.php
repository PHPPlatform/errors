<?php

namespace PhpPlatform\Errors\Exceptions\Persistence;

use PhpPlatform\Errors\Exceptions\Persistence\PersistenceException;

class NoConnectionException extends PersistenceException {
	public function __construct($message = null, $previous = null) {
		parent::__construct ( $message, 10000, $previous );
	}
}
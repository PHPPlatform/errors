<?php

namespace PhpPlatform\Errors\Exceptions\Persistence;

use PhpPlatform\Errors\Exceptions\Persistence\PersistenceException;

class NoAccessException extends PersistenceException {
	public function __construct($message = null, $previous = null) {
		// TODO Auto-generated method stub
		parent::__construct ( $message , 10002, $previous );
	}
}
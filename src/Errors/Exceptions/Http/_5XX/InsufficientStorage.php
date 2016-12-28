<?php

namespace PhpPlatform\Errors\Exceptions\Http\_5XX;

use PhpPlatform\Errors\Exceptions\Http\_5XX\HttpServerExceptions;

final class InsufficientStorage extends HttpServerExceptions {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Insufficient Storage";
		}
		parent::__construct ( $message, 507, $previous );
	}
}
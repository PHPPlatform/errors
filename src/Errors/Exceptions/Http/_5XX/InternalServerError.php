<?php

namespace PhpPlatform\Errors\Exceptions\Http\_5XX;

use PhpPlatform\Errors\Exceptions\Http\_5XX\HttpServerExceptions;

final class InternalServerError extends HttpServerExceptions {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Internal Server Error";
		}
		parent::__construct ( $message, 500, $previous );
	}
}
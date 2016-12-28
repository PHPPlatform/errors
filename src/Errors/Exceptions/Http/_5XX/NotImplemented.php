<?php

namespace PhpPlatform\Errors\Exceptions\Http\_5XX;

use PhpPlatform\Errors\Exceptions\Http\_5XX\HttpServerExceptions;

final class NotImplemented extends HttpServerExceptions {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Not Implemented";
		}
		parent::__construct ( $message, 501, $previous );
	}
}
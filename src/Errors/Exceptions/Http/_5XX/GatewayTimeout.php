<?php

namespace PhpPlatform\Errors\Exceptions\Http\_5XX;

use PhpPlatform\Errors\Exceptions\Http\_5XX\HttpServerExceptions;

final class GatewayTimeout extends HttpServerExceptions {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Gateway Time-out";
		}
		parent::__construct ( $message, 504, $previous );
	}
}
<?php

namespace PhpPlatform\Errors\Exceptions\Http\_4XX;

use PhpPlatform\Errors\Exceptions\Http\_4XX\HttpClientExceptions;

final class Forbidden extends HttpClientExceptions {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Forbidden";
		}
		parent::__construct ( $message, 403, $previous );
	}
}
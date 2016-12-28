<?php

namespace PhpPlatform\Errors\Exceptions\Http\_4XX;

use PhpPlatform\Errors\Exceptions\Http\_4XX\HttpClientExceptions;

final class NotFound extends HttpClientExceptions {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Not Found";
		}
		parent::__construct ( $message, 404, $previous );
	}
}
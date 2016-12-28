<?php

namespace PhpPlatform\Errors\Exceptions\Http\_4XX;

use PhpPlatform\Errors\Exceptions\Http\_4XX\HttpClientExceptions;

final class BadRequest extends HttpClientExceptions {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Bad Request";
		}
		parent::__construct ( $message, 400, $previous );
	}
}
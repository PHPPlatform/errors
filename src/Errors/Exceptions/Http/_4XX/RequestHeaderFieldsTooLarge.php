<?php

namespace PhpPlatform\Errors\Exceptions\Http\_4XX;

use PhpPlatform\Errors\Exceptions\Http\_4XX\HttpClientExceptions;

final class RequestHeaderFieldsTooLarge extends HttpClientExceptions {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Request Header Fields Too Large";
		}
		parent::__construct ( $message, 431, $previous );
	}
}
<?php

namespace PhpPlatform\Errors\Exceptions\Http\_4XX;

use PhpPlatform\Errors\Exceptions\Http\_4XX\HttpClientExceptions;

final class UnavailableForLegalReasons extends HttpClientExceptions {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Unavailable For Legal Reasons";
		}
		parent::__construct ( $message, 451, $previous );
	}
}
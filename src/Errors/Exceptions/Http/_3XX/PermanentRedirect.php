<?php

namespace PhpPlatform\Errors\Exceptions\Http\_3XX;

use PhpPlatform\Errors\Exceptions\Http\_3XX\HttpRedirection;

final class PermanentRedirect extends HttpRedirection {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Permanent Redirect";
		}
		parent::__construct ( $message, 308, $previous );
	}
}
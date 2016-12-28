<?php

namespace PhpPlatform\Errors\Exceptions\Http\_3XX;

use PhpPlatform\Errors\Exceptions\Http\_3XX\HttpRedirection;

final class TemporaryRedirect extends HttpRedirection {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Temporary Redirect";
		}
		parent::__construct ( $message, 307, $previous );
	}
}
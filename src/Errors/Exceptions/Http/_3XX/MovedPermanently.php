<?php

namespace PhpPlatform\Errors\Exceptions\Http\_3XX;

use PhpPlatform\Errors\Exceptions\Http\_3XX\HttpRedirection;

final class MovedPermanently extends HttpRedirection {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Moved Permanently";
		}
		parent::__construct ( $message, 301, $previous );
	}
}
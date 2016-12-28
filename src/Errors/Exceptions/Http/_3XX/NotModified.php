<?php

namespace PhpPlatform\Errors\Exceptions\Http\_3XX;

use PhpPlatform\Errors\Exceptions\Http\_3XX\HttpRedirection;

final class NotModified extends HttpRedirection {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Not Modified";
		}
		parent::__construct ( $message, 304, $previous );
	}
}
<?php

namespace PhpPlatform\Errors\Exceptions\Http\_4XX;

use PhpPlatform\Errors\Exceptions\Http\_4XX\HttpClientExceptions;

final class Gone extends HttpClientExceptions {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Gone";
		}
		parent::__construct ( $message, 410, $previous );
	}
}
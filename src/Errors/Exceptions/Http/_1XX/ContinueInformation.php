<?php

namespace PhpPlatform\Errors\Exceptions\Http\_1XX;

use PhpPlatform\Errors\Exceptions\Http\_1XX\HttpInformational;

final class ContinueInformation extends HttpInformational {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Continue";
		}
		parent::__construct ( $message, 100, $previous );
	}
}
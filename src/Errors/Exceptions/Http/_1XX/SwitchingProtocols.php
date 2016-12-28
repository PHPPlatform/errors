<?php

namespace PhpPlatform\Errors\Exceptions\Http\_1XX;

use PhpPlatform\Errors\Exceptions\Http\_1XX\HttpInformational;

final class SwitchingProtocols extends HttpInformational {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Switching Protocols";
		}
		parent::__construct ( $message, 101, $previous );
	}
}
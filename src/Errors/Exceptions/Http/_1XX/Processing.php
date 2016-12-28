<?php

namespace PhpPlatform\Errors\Exceptions\Http\_1XX;

use PhpPlatform\Errors\Exceptions\Http\_1XX\HttpInformational;

final class Processing extends HttpInformational {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Processing";
		}
		parent::__construct ( $message, 102, $previous );
	}
}
<?php

namespace PhpPlatform\Errors\Exceptions\Http\_2XX;

use PhpPlatform\Errors\Exceptions\Http\_2XX\HttpSuccess;

final class NonAuthoritativeInformation extends HttpSuccess {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Non-Authoritative Information";
		}
		parent::__construct ( $message, 203, $previous );
	}
}
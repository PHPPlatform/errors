<?php

namespace PhpPlatform\Errors\Exceptions\Http\_2XX;

use PhpPlatform\Errors\Exceptions\Http\_2XX\HttpSuccess;

final class IMUsed extends HttpSuccess {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "IM Used";
		}
		parent::__construct ( $message, 226, $previous );
	}
}
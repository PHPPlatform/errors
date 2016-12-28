<?php

namespace PhpPlatform\Errors\Exceptions\Http\_2XX;

use PhpPlatform\Errors\Exceptions\Http\_2XX\HttpSuccess;

final class OK extends HttpSuccess {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "OK";
		}
		parent::__construct ( $message, 200, $previous );
	}
}
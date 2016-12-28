<?php

namespace PhpPlatform\Errors\Exceptions\Http\_2XX;

use PhpPlatform\Errors\Exceptions\Http\_2XX\HttpSuccess;

final class ResetContent extends HttpSuccess {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Reset Content";
		}
		parent::__construct ( $message, 205, $previous );
	}
}
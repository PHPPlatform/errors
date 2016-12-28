<?php

namespace PhpPlatform\Errors\Exceptions\Http\_2XX;

use PhpPlatform\Errors\Exceptions\Http\_2XX\HttpSuccess;

final class NoContent extends HttpSuccess {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "No Content";
		}
		parent::__construct ( $message, 204, $previous );
	}
}
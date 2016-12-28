<?php

namespace PhpPlatform\Errors\Exceptions\Http\_3XX;

use PhpPlatform\Errors\Exceptions\Http\HttpException;

abstract class HttpRedirection extends HttpException {
	
	public function __construct($message = null, $code = null, $previous = null) {
		parent::__construct ( $message , $code , $previous );
	}
}
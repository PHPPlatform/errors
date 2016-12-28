<?php

namespace PhpPlatform\Errors\Exceptions\Http\_4XX;

use PhpPlatform\Errors\Exceptions\Http\HttpException;

abstract class HttpClientExceptions extends HttpException {
	
	public function __construct($message = null, $code = null, $previous = null) {
		parent::__construct ( $message, $code , $previous );
	}
}
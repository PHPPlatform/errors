<?php

namespace PhpPlatform\Errors\Exceptions\Http\_4XX;

use PhpPlatform\Errors\Exceptions\Http\HttpException;

abstract class HttpClientExceptions extends HttpException {
	
	public function __construct($body = null, $message = null, $code = null, $previous = null) {
		parent::__construct ($body, $message, $code , $previous );
	}
}
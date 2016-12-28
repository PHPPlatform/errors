<?php

namespace PhpPlatform\Errors\Exceptions\Http\_2XX;

use PhpPlatform\Errors\Exceptions\Http\HttpException;

abstract class HttpSuccess extends HttpException {
	
	public function __construct($message = null, $code = null, $previous = null) {
		parent::__construct ( $message, $code , $previous );
	}
}
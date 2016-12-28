<?php

namespace PhpPlatform\Errors\Exceptions\Http\_1XX;

use PhpPlatform\Errors\Exceptions\Http\HttpException;

abstract class HttpInformational extends HttpException {
	
	public function __construct($message = null, $code = null, $previous = null) {
		parent::__construct ( $message , $code , $previous );
	}
}
<?php

namespace PhpPlatform\Errors\Exceptions\Http;

use PhpPlatform\Errors\Exceptions\PlatformException;

abstract class HttpException extends PlatformException {
	public function __construct($message = null, $code = null, $previous = null) {
		if(!isset($code)){
			$code = 500;
		}
		$remoteAddress = $_SERVER['REMOTE_ADDR'];
		$requestUri = $_SERVER['REQUEST_URI'];
		parent::__construct ("Http", "[H][$code][$remoteAddress][$requestUri]", $message , $code , $previous );
	}
}
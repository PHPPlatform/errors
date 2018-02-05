<?php

namespace PhpPlatform\Errors\Exceptions\Http;

use PhpPlatform\Errors\Exceptions\PlatformException;

abstract class HttpException extends PlatformException {
	private $body = null;
	public function __construct($body = null, $message = null, $code = null, $previous = null) {
		$this->body = $body;
		if(!isset($code)){
			$code = 500;
		}
		$remoteAddress = $_SERVER['REMOTE_ADDR'];
		$requestUri = $_SERVER['REQUEST_URI'];
		parent::__construct ("Http", "[H][$code][$remoteAddress][$requestUri]", $message , $code , $previous );
	}
	
	/**
	 * This method returns contents of the body , set when creating the HttpException
	 * How to output the body in the reponse should be handled by the Exception handler
	 * 
	 * @return mixed content of the body
	 */
	public function getBody(){
		return $this->body;
	}
}
<?php

namespace PhpPlatform\Errors\Exceptions\Http\_4XX;

use PhpPlatform\Errors\Exceptions\Http\_4XX\HttpClientExceptions;

final class RequestTimeout extends HttpClientExceptions {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Request Time-out", 408, $previous );
	}
}
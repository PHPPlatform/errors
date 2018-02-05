<?php

namespace PhpPlatform\Errors\Exceptions\Http\_5XX;

use PhpPlatform\Errors\Exceptions\Http\_5XX\HttpServerExceptions;

final class BadGateway extends HttpServerExceptions {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Bad Gateway", 502, $previous );
	}
}
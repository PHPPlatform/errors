<?php

namespace PhpPlatform\Errors\Exceptions\Http\_5XX;

use PhpPlatform\Errors\Exceptions\Http\_5XX\HttpServerExceptions;

final class NetworkAuthenticationRequired extends HttpServerExceptions {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Network Authentication Required", 511, $previous );
	}
}
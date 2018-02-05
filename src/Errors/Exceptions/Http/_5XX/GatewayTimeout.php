<?php

namespace PhpPlatform\Errors\Exceptions\Http\_5XX;

use PhpPlatform\Errors\Exceptions\Http\_5XX\HttpServerExceptions;

final class GatewayTimeout extends HttpServerExceptions {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Gateway Time-out", 504, $previous );
	}
}
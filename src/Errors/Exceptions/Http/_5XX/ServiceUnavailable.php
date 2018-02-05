<?php

namespace PhpPlatform\Errors\Exceptions\Http\_5XX;

use PhpPlatform\Errors\Exceptions\Http\_5XX\HttpServerExceptions;

final class ServiceUnavailable extends HttpServerExceptions {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Service Unavailable", 503, $previous );
	}
}
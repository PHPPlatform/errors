<?php

namespace PhpPlatform\Errors\Exceptions\Http\_5XX;

use PhpPlatform\Errors\Exceptions\Http\_5XX\HttpServerExceptions;

final class HTTPVersionNotSupported extends HttpServerExceptions {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "HTTP Version Not Supported", 505, $previous );
	}
}
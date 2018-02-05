<?php

namespace PhpPlatform\Errors\Exceptions\Http\_4XX;

use PhpPlatform\Errors\Exceptions\Http\_4XX\HttpClientExceptions;

final class PreconditionRequired extends HttpClientExceptions {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Precondition Required", 428, $previous );
	}
}
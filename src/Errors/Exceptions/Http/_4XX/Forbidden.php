<?php

namespace PhpPlatform\Errors\Exceptions\Http\_4XX;

use PhpPlatform\Errors\Exceptions\Http\_4XX\HttpClientExceptions;

final class Forbidden extends HttpClientExceptions {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Forbidden", 403, $previous );
	}
}
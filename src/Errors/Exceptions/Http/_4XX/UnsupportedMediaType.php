<?php

namespace PhpPlatform\Errors\Exceptions\Http\_4XX;

use PhpPlatform\Errors\Exceptions\Http\_4XX\HttpClientExceptions;

final class UnsupportedMediaType extends HttpClientExceptions {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Unsupported Media Type", 415, $previous );
	}
}
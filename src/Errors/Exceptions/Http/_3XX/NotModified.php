<?php

namespace PhpPlatform\Errors\Exceptions\Http\_3XX;

use PhpPlatform\Errors\Exceptions\Http\_3XX\HttpRedirection;

final class NotModified extends HttpRedirection {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Not Modified", 304, $previous );
	}
}
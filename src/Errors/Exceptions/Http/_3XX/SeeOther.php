<?php

namespace PhpPlatform\Errors\Exceptions\Http\_3XX;

use PhpPlatform\Errors\Exceptions\Http\_3XX\HttpRedirection;

final class SeeOther extends HttpRedirection {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "See Other", 303, $previous );
	}
}
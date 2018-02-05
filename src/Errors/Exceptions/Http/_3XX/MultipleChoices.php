<?php

namespace PhpPlatform\Errors\Exceptions\Http\_3XX;

use PhpPlatform\Errors\Exceptions\Http\_3XX\HttpRedirection;

final class MultipleChoices extends HttpRedirection {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Multiple Choices", 300, $previous );
	}
}
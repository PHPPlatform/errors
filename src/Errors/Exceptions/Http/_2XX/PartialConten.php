<?php

namespace PhpPlatform\Errors\Exceptions\Http\_2XX;

use PhpPlatform\Errors\Exceptions\Http\_2XX\HttpSuccess;

final class PartialConten extends HttpSuccess {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Partial Conten", 206, $previous );
	}
}
<?php

namespace PhpPlatform\Errors\Exceptions\Http\_2XX;

use PhpPlatform\Errors\Exceptions\Http\_2XX\HttpSuccess;

final class MultiStatus extends HttpSuccess {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Multi-Status", 207, $previous );
	}
}
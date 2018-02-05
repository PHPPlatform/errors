<?php

namespace PhpPlatform\Errors\Exceptions\Http\_2XX;

use PhpPlatform\Errors\Exceptions\Http\_2XX\HttpSuccess;

final class NoContent extends HttpSuccess {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "No Content", 204, $previous );
	}
}
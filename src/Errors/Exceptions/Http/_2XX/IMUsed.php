<?php

namespace PhpPlatform\Errors\Exceptions\Http\_2XX;

use PhpPlatform\Errors\Exceptions\Http\_2XX\HttpSuccess;

final class IMUsed extends HttpSuccess {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "IM Used", 226, $previous );
	}
}
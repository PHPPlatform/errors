<?php

namespace PhpPlatform\Errors\Exceptions\Http\_2XX;

use PhpPlatform\Errors\Exceptions\Http\_2XX\HttpSuccess;

final class NonAuthoritativeInformation extends HttpSuccess {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Non-Authoritative Information", 203, $previous );
	}
}
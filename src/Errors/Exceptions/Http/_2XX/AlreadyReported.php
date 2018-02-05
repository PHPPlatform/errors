<?php

namespace PhpPlatform\Errors\Exceptions\Http\_2XX;

use PhpPlatform\Errors\Exceptions\Http\_2XX\HttpSuccess;

final class AlreadyReported extends HttpSuccess {
	public function __construct($body = null, $message = null, $previous = null) {
		parent::__construct ($body, "Already Reported", 208, $previous );
	}
}
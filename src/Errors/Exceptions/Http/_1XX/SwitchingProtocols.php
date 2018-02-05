<?php

namespace PhpPlatform\Errors\Exceptions\Http\_1XX;

use PhpPlatform\Errors\Exceptions\Http\_1XX\HttpInformational;

final class SwitchingProtocols extends HttpInformational {
	public function __construct($body = null, $previous = null) {
		parent::__construct ( $body, "Switching Protocols", 101, $previous );
	}
}
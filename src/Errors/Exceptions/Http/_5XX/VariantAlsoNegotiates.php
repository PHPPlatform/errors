<?php

namespace PhpPlatform\Errors\Exceptions\Http\_5XX;

use PhpPlatform\Errors\Exceptions\Http\_5XX\HttpServerExceptions;

final class VariantAlsoNegotiates extends HttpServerExceptions {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Variant Also Negotiates";
		}
		parent::__construct ( $message, 506, $previous );
	}
}
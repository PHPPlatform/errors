<?php

namespace PhpPlatform\Errors\Exceptions\Http\_3XX;

use PhpPlatform\Errors\Exceptions\Http\_3XX\HttpRedirection;

final class MultipleChoices extends HttpRedirection {
	public function __construct($message = null, $previous = null) {
		if(!isset($message)){
			$message = "Multiple Choices";
		}
		parent::__construct ( $message, 300, $previous );
	}
}
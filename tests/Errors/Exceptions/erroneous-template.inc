<?php
use PhpPlatform\Errors\ErrorHandler;
use PhpPlatform\Mock\Config\MockSettings;

ob_start();

require_once '$autoloadScript';

MockSettings::setSettings('$thisPackageName', "logs.System", '$logFile');

ErrorHandler::handleError();

$erroneousSourceCode;
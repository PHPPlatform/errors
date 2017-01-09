<?php

namespace PHPPlatform\tests\Errors\Exceptions;

use PhpPlatform\Config\SettingsCache;
use PhpPlatform\Errors\ErrorHandler;
use PhpPlatform\Mock\Config\MockSettings;
use PhpPlatform\Errors\Exceptions\PlatformException;
use Composer\Autoload\ClassLoader;

class TestErrorHandler extends \PHPUnit_Framework_TestCase {
	
	static $thisPackageName = 'php-platform/errors';
	private $logFile = "";
	private $traceFile = "";
	
	protected function setUp(){
		SettingsCache::reset();
		
		$this->logFile = tempnam(sys_get_temp_dir(), "MOCK");
		file_put_contents($this->logFile, '');
		
		$this->traceFile = tempnam(sys_get_temp_dir(), "MOCK");
		file_put_contents($this->traceFile, '');
	}
	
	protected function tearDown(){
		if(is_file($this->logFile)){
			unlink($this->logFile);
		}
		if(is_file($this->traceFile)){
			unlink($this->traceFile);
		}
	}
	
	/**
	 * 
	 * @dataProvider catchableExceptionsProvider
	 * 
	 * @param callable $errorSource
	 * @param boolean $producesException
	 * @param string $error_log
	 */
	public function testErrorHandlingForCatchableErrors($errorSource,$producesException,$error_log){
	
		ErrorHandler::handleError();
		MockSettings::setSettings(self::$thisPackageName, "logs.System", $this->logFile);
	
		$isException = false;
		try{
			call_user_func($errorSource);
		}catch (PlatformException $e){
			$isException = true;
		}
		$producesException?parent::assertTrue($isException):parent::assertTrue(!$isException);
		
		
		$log = file_get_contents($this->logFile);
		parent::assertContains($error_log, $log);
	
	}
	
	
	public function catchableExceptionsProvider(){
		return array(
			array(function(){
				$f = fopen("nonexistingfile", "r");
			},false,'[S][E_WARNING] fopen(nonexistingfile): failed to open stream: No such file or directory : PhpPlatform\Errors\Exceptions\System\SystemWarning'),
			array(function(){
				$arr = array("username"=>"myUserName");
				$arr[username];
			},false,'[S][E_NOTICE] Use of undefined constant username - assumed \'username\' : PhpPlatform\Errors\Exceptions\System\SystemWarning'),
			array(function(){
				trigger_error("Trigger Warning",E_USER_WARNING);
			},false,'[S][E_USER_WARNING] Trigger Warning : PhpPlatform\Errors\Exceptions\System\SystemWarning'),
			array(function(){
				trigger_error("Trigger Deprecated",E_USER_DEPRECATED);
			},false,'[S][E_USER_DEPRECATED] Trigger Deprecated : PhpPlatform\Errors\Exceptions\System\SystemWarning'),
			array(function(){
				trigger_error("Trigger Error",E_USER_ERROR);
			},true,'[S][E_USER_ERROR] Trigger Error : PhpPlatform\Errors\Exceptions\System\SystemError'),
			array(function(){
				trigger_error("Trigger Notice");
			},false,'[S][E_USER_NOTICE] Trigger Notice : PhpPlatform\Errors\Exceptions\System\SystemWarning'),
			array(function(){
				$recoverable = new \stdClass(); 
                $rec = (string)$recoverable;
			},true,'[S][E_RECOVERABLE_ERROR] Object of class stdClass could not be converted to string : PhpPlatform\Errors\Exceptions\System\SystemError')
		);
	}
	
	
	/**
	 * @requires PHP 5.4
	 * @dataProvider systemExceptionsProvider
	 */
	public function testErrorHandlingForSystemExceptions($erroneousSourceCode,$expectedError,$expectedOutput){
	
		$classLoaderReflection = new \ReflectionClass(new ClassLoader());
		$vendorDir = dirname(dirname($classLoaderReflection->getFileName()));
		$autoloadScript = $vendorDir.'/autoload.php';
		
		$phpFileContent = file_get_contents(__DIR__.'/erroneous-template.inc');
		$phpFileContent = str_replace('$autoloadScript', $autoloadScript, $phpFileContent);
		$phpFileContent = str_replace('$thisPackageName', self::$thisPackageName, $phpFileContent);
		$phpFileContent = str_replace('$logFile', $this->logFile, $phpFileContent);
		$phpFileContent = str_replace('$erroneousSourceCode;', $erroneousSourceCode, $phpFileContent);
		
		$phpFileWithErrors = tempnam(sys_get_temp_dir(), "MOCK");
		file_put_contents($phpFileWithErrors, $phpFileContent);
		
		$outputFile = tempnam(sys_get_temp_dir(), "ERR");
		
		$output = array();
		$returnCode = 0;
		$command = PHP_BINARY.' -n '.$phpFileWithErrors.' > '.$outputFile .' 2>&1';
		exec($command,$output,$returnCode);
		
		$log = file_get_contents($this->logFile);
		parent::assertContains($expectedError, $log);
		
		$output = file_get_contents($outputFile);
		
		parent::assertEquals($expectedOutput,trim($output));
	}
	
	public function systemExceptionsProvider(){
		
		$parseErrorFile = tempnam(sys_get_temp_dir(), "PAR");
		file_put_contents($parseErrorFile, "<?php \n noSemicolon()");
		
		$errorUpdateforPHP7 = '[S][E_ERROR] Call to undefined function undefinedFunction() : PhpPlatform\Errors\Exceptions\System\SystemError';
		if(strpos(phpversion(), "7.") === 0){
			$errorUpdateforPHP7 = 'Call to undefined function undefinedFunction()';
		}
		
		return array(
				array('undefinedFunction();',$errorUpdateforPHP7,''),
				array("include_once '$parseErrorFile';",'[S][E_PARSE] syntax error, unexpected end of file : PhpPlatform\Errors\Exceptions\System\SystemError','')
		);
	}
	
	
	

	
}
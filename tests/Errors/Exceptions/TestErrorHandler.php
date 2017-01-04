<?php

namespace PHPPlatform\tests\Errors\Exceptions;

use PhpPlatform\Config\SettingsCache;
use PHPUnit\Framework\TestCase;
use PhpPlatform\Errors\ErrorHandler;
use PhpPlatform\Mock\Config\MockSettings;
use PhpPlatform\Errors\Exceptions\PlatformException;
use Composer\Autoload\ClassLoader;

class TestErrorHandler extends TestCase {
	
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
	
	public function testErrorHandlingForUserError(){
		
		ErrorHandler::handleError();
		MockSettings::setSettings(self::$thisPackageName, "logs.System", $this->logFile);

		$isException = false;
		try{
			trigger_error("Trigger Warning",E_USER_WARNING);
		}catch (PlatformException $e){
			$isException = true;
		}
		parent::assertTrue(!$isException);
		$log = file_get_contents($this->logFile);
		parent::assertContains('[S][2] Trigger Warning : PhpPlatform\Errors\Exceptions\System\SystemWarning', $log);
		
	}
	
	/* public function testErrorHandlingForNotice(){
	
		ErrorHandler::handleError();
		MockSettings::setSettings(self::$thisPackageName, "logs.System", $this->logFile);
	
		$isException = false;
		try{
			$arr = array('username'=>"myUserName");
			$arr[username]; /// generats E_NOTICE
		}catch (PlatformException $e){
			$isException = true;
		}
		parent::assertTrue(!$isException);
		$log = file_get_contents($this->logFile);
		echo $log;
		//parent::assertContains('[S][2] Trigger Warning : PhpPlatform\Errors\Exceptions\System\SystemWarning', $log);
	
	} */
	
	/**
	 * @dataProvider systemExceptionsProvider
	 */
	public function testErrorHandlingForSystemExceptions($erroneousSourceCode,$expectedError){
	
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
		
		parent::assertEquals('',trim($output));
	}
	
	public function systemExceptionsProvider(){
		
		$parseErrorFile = tempnam(sys_get_temp_dir(), "PAR");
		file_put_contents($parseErrorFile, "<?php \n noSemicolon()");
		
		$noticeErrorFile = tempnam(sys_get_temp_dir(), "PAR");
		file_put_contents($noticeErrorFile, '<?php \n noSemicolon()');
		
		return array(
				array('undefinedFunction();','[S][1] Call to undefined function undefinedFunction() : PhpPlatform\Errors\Exceptions\System\SystemError'),
				array("include_once '$parseErrorFile';",'[S][1] syntax error, unexpected end of file : PhpPlatform\Errors\Exceptions\System\SystemError'),
				array('$arr = array("username"=>"myUserName");echo $arr[username];','[S][2] Use of undefined constant username - assumed \'username\' : PhpPlatform\Errors\Exceptions\System\SystemWarning')
		);
	}
	
	
	

	
}
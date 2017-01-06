<?php

namespace PHPPlatform\tests\Errors\Exceptions;

use PhpPlatform\Mock\Config\MockSettings;
use PhpPlatform\Config\SettingsCache;
use PhpPlatform\Errors\Exceptions\Application\Debug;
use PhpPlatform\Errors\Exceptions\Persistence\BadQueryException;

class TestException extends \PHPUnit_Framework_TestCase {
	
	static $thisPackageName = 'php-platform/errors';
	private $logFile = "";
	private $traceFile = "";
	
	protected function setUp(){
		SettingsCache::reset();
		$this->logFile = tempnam(sys_get_temp_dir(), "MOCK");
		//clear the file
		file_put_contents($this->logFile, '');
		
		$this->traceFile = tempnam(sys_get_temp_dir(), "MOCK");
		//clear the file
		file_put_contents($this->traceFile, '');
		
	}
	
	public function testLogging(){
		
		MockSettings::setSettings(self::$thisPackageName, "logs.Application", $this->logFile);
		new Debug("Testing Logging");
		new BadQueryException("Testing Persistence Logging");
		
		$logMesage = file_get_contents($this->logFile);
		
		$this->assertEquals(173,strlen($logMesage));
		$this->assertContains('[A] Testing Logging : PhpPlatform\Errors\Exceptions\Application\Debug', $logMesage);
		
	}
	
	public function testTraces(){
		
		MockSettings::setSettings(self::$thisPackageName, "traces.Application", $this->traceFile);
		$badQueryException = new BadQueryException("Testing Persistence Logging");
		new Debug("Testing Logging",$badQueryException);
		$trace = file_get_contents($this->traceFile);
		
		parent::assertContains('Testing Logging : PhpPlatform\Errors\Exceptions\Application\Debug', $trace);
		parent::assertContains('TestException.php', $trace);
		parent::assertContains(' Caused By ....', $trace);
		parent::assertContains('Testing Persistence Logging : PhpPlatform\Errors\Exceptions\Persistence\BadQueryException', $trace);
		
	}
	
	
	
}
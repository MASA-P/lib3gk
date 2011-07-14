<?php
require_once 'PHPUnit/Framework.php';
require_once(dirname(dirname(__FILE__)).'/libs/lib3gk.php');
require_once(dirname(__FILE__).'/includes/settings.php');

class Lib3gkTest extends PHPUnit_Framework_TestCase {

	protected $Lib3gk = null;
	
	protected function setUp(){
		$this->Lib3gk = new Lib3gk();
		$this->Lib3gk->initialize();
	}
	
	protected function tearDown(){
		$this->Lib3gk->shutdown();
		$this->Lib3gk = null;
		
	}
	
	public function testGetVersion(){
		$str = $this->Lib3gk->get_version();
		$this->assertEquals($str, '0.5.0');
	}
	
	public function testGetIpCarrier(){
		$result = $this->Lib3gk->get_ip_carrier();
		$this->assertTrue(is_integer($result));
	}
	
}

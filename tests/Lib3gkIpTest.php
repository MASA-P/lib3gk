<?php
require_once 'PHPUnit/Framework.php';
require_once(dirname(dirname(__FILE__)).'/libs/lib3gk_ip.php');
require_once(dirname(__FILE__).'/includes/settings.php');

class Lib3gkIpTest extends PHPUnit_Framework_TestCase {

	protected $Lib3gkIp = null;
	
	protected function setUp(){
		$this->Lib3gkIp = new Lib3gkIp();
		$this->Lib3gkIp->initialize();
	}
	
	protected function tearDown(){
		$this->Lib3gkIp->shutdown();
		$this->Lib3gkIp = null;
		
	}
	
	public function testIp2long(){
		$test_value = $this->Lib3gkIp->ip2long('12.34.56.78');
		$this->assertEquals($test_value, 0x0c22384e);
		
		$test_value = $this->Lib3gkIp->ip2long('12345678');
		$this->assertEquals($test_value, false);
	}
	
	public function testIsInclusive(){
		$test_value = $this->Lib3gkIp->is_inclusive('192.168.1.1', '192.168.1.0/24');
		$this->assertTrue($test_value);
		
		$test_value = $this->Lib3gkIp->is_inclusive('192.168.1.1', '192.168.1.1');
		$this->assertTrue($test_value);
		
		$test_value = $this->Lib3gkIp->is_inclusive('192.168.1.1', '192.168.1.2');
		$this->assertFalse($test_value);
		
		$test_value = $this->Lib3gkIp->is_inclusive('192.168.1.129', '192.168.1.0/25');
		$this->assertFalse($test_value);
	}
	
	public function testIp2Carrier(){
		$test_value = $this->Lib3gkIp->ip2carrier();
		$this->assertEquals($test_value, 0);
		
		$test_value = $this->Lib3gkIp->ip2carrier('192.168.1.1');
		$this->assertEquals($test_value, 0);
		
		$test_value = $this->Lib3gkIp->ip2carrier('210.153.84.1');
		$this->assertEquals($test_value, 1);
		
		$test_value = $this->Lib3gkIp->ip2carrier('210.230.128.225');
		$this->assertEquals($test_value, 2);
		
		$test_value = $this->Lib3gkIp->ip2carrier('123.108.237.1');
		$this->assertEquals($test_value, 3);
		
		$test_value = $this->Lib3gkIp->ip2carrier('117.55.1.225');
		$this->assertEquals($test_value, 4);
		
		$test_value = $this->Lib3gkIp->ip2carrier('126.240.0.1');
		$this->assertEquals($test_value, 5);
		
		$test_value = $this->Lib3gkIp->ip2carrier('61.198.128.1');
		$this->assertEquals($test_value, 6);
		
		$test_value = $this->Lib3gkIp->ip2carrier('72.14.199.1');
		$this->assertEquals($test_value, 7);
		
	}

}

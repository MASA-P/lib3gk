<?php
require_once 'PHPUnit/Framework.php';
require_once(dirname(dirname(__FILE__)).'/libs/lib3gk_machine.php');
require_once(dirname(__FILE__).'/includes/settings.php');

class Lib3gkMachineTest extends PHPUnit_Framework_TestCase {

	protected $Lib3gkMachine = null;
	
	protected function setUp(){
		$this->Lib3gkMachine = new Lib3gkMachine();
		$this->Lib3gkMachine->initialize();
	}
	
	protected function tearDown(){
		$this->Lib3gkMachine->shutdown();
		$this->Lib3gkMachine = null;
		
	}
	
	public function testGetMachineInfo(){
		$carrier_name = 'others';
		$machine_name = 'default';
		$arr = $this->Lib3gkMachine->get_machineinfo($carrier_name, $machine_name);
		$this->assertTrue($arr['carrier_name'] == $carrier_name && $arr['machine_name'] == $machine_name);
		$this->assertFalse(isset($arr['font_size']));
		
		$carrier_name = 'Android';
		$machine_name = 'default';
		$arr = $this->Lib3gkMachine->get_machineinfo($carrier_name, $machine_name);
		$this->assertTrue($arr['carrier_name'] == $carrier_name && $arr['machine_name'] == $machine_name);
		
	}
	
}

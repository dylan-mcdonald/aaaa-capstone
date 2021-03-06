<?php
namespace Edu\Cnm\DdcAaaa\Test;

use Edu\Cnm\DdcAaaa\{
	Bridge
};

// grab the project test parameters
require_once("AaaaTest.php");

// grab the class under scrutiny
require_once(dirname(__DIR__) . "/classes/autoload.php");

/**
 * Full PHPUnit test for the Bridge class
 *
 * This is a complete PHPUnit test of the Bridge class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see Bridge
 *
 **/
class BridgeTest extends AaaaTest {
	/**
	 * content of the Bridge
	 * @var string $VALID_BRIDGESTAFFID
	 **/
	protected $VALID_BRIDGESTAFFID = '5';

	protected $VALID_BRIDGENAME = 'Dylan';

	protected $VALID_BRIDGEUSERNAME = 'deepdivedylan';

	/**
	 * create dependent objects before running each test
	 **/
	public final function setUp() {
		// run the default setUp() method first
		parent::setUp();
	}
	/**
	 * test inserting a valid Bridge and verify that the actual mySQL data matches
	 **/
	public function testInsertValidBridge() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("bridge");

		// create a new Bridge and insert to into mySQL
		$bridge = new Bridge($this->VALID_BRIDGESTAFFID, $this->VALID_BRIDGENAME, $this->VALID_BRIDGEUSERNAME);
		$bridge->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoBridge = Bridge::getBridgeByBridgeStaffId($this->getPDO(), $bridge->getBridgeStaffId());

		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("bridge"));
		$this->assertEquals($pdoBridge->getBridgeStaffId(), $this->VALID_BRIDGESTAFFID);
		$this->assertEquals($pdoBridge->getBridgeName(), $this->VALID_BRIDGENAME);
		$this->assertEquals($pdoBridge->getBridgeUserName(), $this->VALID_BRIDGEUSERNAME);
	}

	/**
	 * test inserting a Bridge that already exists
	 *
	 * @expectedException \PDOException
	 **/
	public function testInsertInvalidBridge() {
		// create a Bridge
		$bridge = new Bridge("111222333", $this->VALID_BRIDGENAME, $this->VALID_BRIDGEUSERNAME);
		$bridge->insert($this->getPDO());
		// attempt to create the exact same bridge
		$bridge = new Bridge("111222333", $this->VALID_BRIDGENAME, $this->VALID_BRIDGEUSERNAME);
		$bridge->insert($this->getPDO());
	}

	/**
	 * test grabbing a Bridge by bridge name
	 **/
	public function testGetValidBridgeByBridgeName() {

		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("bridge");

		// create a new Bridge and insert to into mySQL
		$bridge = new Bridge($this->VALID_BRIDGESTAFFID, $this->VALID_BRIDGENAME, $this->VALID_BRIDGEUSERNAME);
		$bridge->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoBridge = Bridge::getBridgeByBridgeName($this->getPDO(), $bridge->getBridgeName());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("bridge"));
		$this->assertNotNull($pdoBridge);
		$this->assertInstanceOf("Edu\\Cnm\\DdcAaaa\\Bridge", $pdoBridge);

		// grab the result from the array and validate it
		$this->assertEquals($pdoBridge->getBridgeStaffId(), $this->VALID_BRIDGESTAFFID);
		$this->assertEquals($pdoBridge->getBridgeName(), $this->VALID_BRIDGENAME);
		$this->assertEquals($pdoBridge->getBridgeUserName(), $this->VALID_BRIDGEUSERNAME);
	}
	/**
	 * test grabbing a Bridge by name that does not exist
	 **/
	public function testGetInvalidBridgeByBridgeName() {
		// grab a bridge by searching for content that does not exist
		$bridge = Bridge::getBridgeByBridgeName($this->getPDO(), "not a valid key");
		$this->assertEmpty($bridge);
	}

	/**
	 * test grabbing a Bridge by bridge name
	 **/
	public function testGetValidBridgeByBridgeUserName() {

		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("bridge");

		// create a new Bridge and insert to into mySQL
		$bridge = new Bridge($this->VALID_BRIDGESTAFFID, $this->VALID_BRIDGENAME, $this->VALID_BRIDGEUSERNAME);
		$bridge->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoBridge = Bridge::getBridgeByBridgeUserName($this->getPDO(), $bridge->getBridgeUserName());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("bridge"));
		$this->assertNotNull($pdoBridge);
		$this->assertInstanceOf("Edu\\Cnm\\DdcAaaa\\Bridge", $pdoBridge);

		// grab the result from the array and validate it
		$this->assertEquals($pdoBridge->getBridgeStaffId(), $this->VALID_BRIDGESTAFFID);
		$this->assertEquals($pdoBridge->getBridgeName(), $this->VALID_BRIDGENAME);
		$this->assertEquals($pdoBridge->getBridgeUserName(), $this->VALID_BRIDGEUSERNAME);
	}
	/**
	 * test grabbing a Bridge by name that does not exist
	 **/
	public function testGetInvalidBridgeByBridgeUserName() {
		// grab a bridge by searching for content that does not exist
		$bridge = Bridge::getBridgeByBridgeUserName($this->getPDO(), "not a valid key");
		$this->assertEmpty($bridge);
	}

	/**
	 * test grabbing a Bridge by bridge staffId
	 **/
	public function testGetValidBridgeByBridgeStaffId() {

		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("bridge");

		// create a new Bridge and insert to into mySQL
		$bridge = new Bridge($this->VALID_BRIDGESTAFFID, $this->VALID_BRIDGENAME, $this->VALID_BRIDGEUSERNAME);
		$bridge->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = Bridge::getBridgeByBridgeStaffId($this->getPDO(), $bridge->getBridgeStaffId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("bridge"));
		$this->assertNotNull($results);
		$this->assertInstanceOf("Edu\\Cnm\\DdcAaaa\\Bridge", $results);

		// grab the result from the array and validate it

		$this->assertEquals($results->getBridgeStaffId(), $this->VALID_BRIDGESTAFFID);
		$this->assertEquals($results->getBridgeName(), $this->VALID_BRIDGENAME);
		$this->assertEquals($results->getBridgeUserName(), $this->VALID_BRIDGEUSERNAME);
	}

	/**
	 * test grabbing a Bridge by staffId that does not exist
	 **/
	public function testGetInvalidBridgeByBridgeStaffId() {
		// grab a bridge by searching for content that does not exist
		$bridge = Bridge::getBridgeByBridgeStaffId($this->getPDO(), "not a valid key");
		$this->assertNull($bridge);
	}

	/**
	 * test grabbing all Bridges
	 **/
	public function testGetAllValidBridges() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("bridge");

		// create a new Bridge and insert to into mySQL
		$bridge = new Bridge($this->VALID_BRIDGESTAFFID, $this->VALID_BRIDGENAME, $this->VALID_BRIDGEUSERNAME);
		$bridge->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = Bridge::getAllBridges($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("bridge"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\DdcAaaa\\Bridge", $results);

		// grab the result from the array and validate it
		$pdoBridge = $results[0];
		$this->assertEquals($pdoBridge->getBridgeStaffId(), $this->VALID_BRIDGESTAFFID);
		$this->assertEquals($pdoBridge->getBridgeName(), $this->VALID_BRIDGENAME);
		$this->assertEquals($pdoBridge->getBridgeUserName(), $this->VALID_BRIDGEUSERNAME);
	}
}
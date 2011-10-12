<?php
require_once("config.php");
require_once(FRAME_PATH.db.MySQL);
require_once(FRAME_PATH.ables.Connectable);

class MySQLTest extends PHPUnit_Framework_TestCase {
	private $db;

	public function setUp(){
		$this->db = new frame\MySQLDatabase(SQL_DEFAULT_PATH);
	}
	
	/**
	 * @expectedException frame\SQLUserException
	 * @expectedExceptionMessage no blank usernames
	 */
	public function testValidateBlankUser(){
		// User doesn't add defaults
		// MySQLUser does add its defaults
		$user = new frame\MySQLUser("", "");
		$user->setUsername("");
		$user->validate();
	}

	public function testValidUser(){
		$user = new frame\MySQLUser("crap", "weak");
		$this->db->setUser($user);
	}

	public function testUserConstruct(){
		$strName = "f.bar";
		$strPassword = "hex47";
		$user = new frame\MySQLUser($strName, $strPassword);
		// confirm that the construct works
		$this->assertEquals($strName, $user->getUsername());
		$this->assertEquals($strPassword, $user->getPassphrase());
	}

	// following test require or initiate db connection
	/**
	 * @expectedException frame\UserException
	 * @expectedExceptionMessage invalid user object
	 */
	public function testInvalidDBUser(){
		$this->db->setUser("hi");
	}

	// should throw exception when adding empty element
	/**
	 * @expectedException EmptyElementExeption
	 * @expectedExceptionMessage futile to add NULL element
	 */
	public function testAddingNullElement(){
	}

	public function testDefaultDBConnectionState(){
		$user = frame\MySQLUser(TESTUSER, TESTPASS);
		var_dump($this->db->ping());
	}
/**
	 * @expectedException frame\ConnectionException
	 * @expectedExceptionMessage cannot connect to database
	 */
	public function testImpossibleConnectToDB(){
		$user = frame\MySQLUser(TESTUSER, TESTPASS);
		$this->db->setUser($user);
		$this->db->connect();
		//$this->assertEquals(Connectable::UNKNOWN
	}

	public function testSuccessfulConnectToDB(){
		$user = frame\MySQLUser("admin", "test");
	}
}
?>

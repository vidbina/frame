<?php
require_once("config.php");
require_once(FRAME_PATH.db.MySQL);

class MySQLTest extends PHPUnit_Framework_TestCase {
	private $db;
	public function setUp(){
		$this->db = new frame\MySQLDatabase(SQL_DEFAULT_PATH);
	}
	
	// 
	public function testValidUser(){
		$user = new frame\MySQLUser();
		var_dump($user);
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

	/**
	 * @expectedException UserException
	 * @expectedExceptionMesage cannot validate the nonexisting
	 */
	public function testValidateBlankUser(){
		$user = new frame\MySQLUser("", "");
		$user->validate();
	}

	public function testBlankNameUser(){
		$user = new frame\MySQLUser();
	}

	// following test require or initiate db connection
	/**
	 * @expectedException UserException
	 * @expectedExceptionMessage invalid user
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
		$this->object->addElement();
	}

}
?>

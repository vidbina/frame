<?php
require_once("config.php");
require_once(FRAME_PATH.Page);

class ContainerTest extends PHPUnit_Framework_TestCase {
	private $object;

	public function setup(){
		$this->object = new frame\Container();
	}

	public function testContainerContentType() {
		$this->assertTrue(is_array($this->object->getContent()));
	}

	// should throw exception when adding empty element
	/**
	 * @expectedException EmptyElementExeption
	 * @expectedExceptionMessage futile to add NULL element
	 */
	public function testAddingNullElement(){
		$this->object->addElement();
	}

	// should throw exception when adding blank element
	/**
	 * @expectedException EmptyElementExeption
	 * @expectedExceptionMessage futile to add NULL element
	 */
	public function testAddingBlankElement(){
		$this->object->addElement("");
	}

	// should throw exception when adding 0 element
	// this because a element cannot just simply be a primitive
	/**
	 * @expectedException EmptyElementExeption
	 * @expectedExceptionMessage futile to add NULL element
	 */
	public function testAddingZeroElement(){
		$this->object->addElement(0);
	}	
	
	// should throw exception when adding datatypes
	public function testAddingTypeAsElement(){
		$this->object->addElement("haha");
		$this->object->addElement(23);
		$this->
	}	
}
?>

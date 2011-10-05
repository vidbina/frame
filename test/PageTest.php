<?php
require_once("config.php");
require_once(FRAME_PATH.view.Page);

class PageTest extends PHPUnit_Framework_TestCase {
	private $object;

	public function setUp(){
		$this->object = new frame\Page();
	}

	// should render null when rendering freshly spawned Page

	// should throw exception when Template is not set
	/**
	 * @expectedException PageException
	 * @expectedExceptionMessage template not set
	 */
	public function testExceptionTemplateNotSet() {
		$this->object->render();
	}

	// should throw exception when Content is not set
	/**
	 * @expectedException PageException
	 * @expectedExceptionMessage no content 
	 */
	public function testExceptionNoContent() {
		$this->object->setTemplate("x");
		$this->object->render();
		// TODO: add code
	}

	// should have a settable title through getter and setter methods
	public function testTitleSetterandGetter() {
		// TODO: add code
	}
	
	// should have a settable Template through getter and setter methods
	public function testTemplateSetterandGetter() {
		// TODO: add code
	}
}
?>

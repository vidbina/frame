<?php
require_once("config.php");
require_once(FRAME_PATH.view.Page);
require_once(FRAME_PATH.view.templates.HTML5);

class PageTest extends PHPUnit_Framework_TestCase {
	private $object;

	public function setUp(){
		$this->object = new frame\Page();
	}

	// should render null when rendering freshly spawned Page

	// should throw exception when Template is not set
	/**
	 * @expectedException frame\PageException
	 * @expectedExceptionMessage template not set
	 */
	public function testExceptionTemplateNotSet() {
		$this->object->render();
	}

	// setting invalid template
	/**
	 * @expectedException frame\PageException
	 * @expectedExceptionMessage invalid template
	 */
	public function testInvalidTemplate() {
		$this->object->setTemplate("x");
	}

	// page rendering with valid template
	public function testValidTemplate() {
		$template = new frame\HTML5Template();
		$this->object->setTemplate($template);
		$this->assertTrue($this->object->render());
	}
	
	// should have a settable title through getter and setter methods
	public function testTitleSetterandGetter() {
		// TODO: add code
		$string = "flippedyfloppidyfloop";
		$this->object->setTitle($string);
		$this->assertEquals($string, $this->object->getTitle());
	}
	
	// should have a settable Template through getter and setter methods
	public function testTemplateSetterandGetter() {
		// TODO: add code
	}
}
?>

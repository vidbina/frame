<?php
require_once("config.php");
require_once(FRAME_PATH.view.Page);

class PageTest extends PHPUnit_Framework_TestCase {
	private $object;

	public function setUp(){
		$this->object = new frame\Page();
	}

	// throw exception when Template is not set
	/**
	 * @expectedException frame\PageException
	 * @expectedExceptionMessage template not set
	 */
	public function testExceptionTemplateNotSet() {
		$this->object->render();
	}

	// throw exception on invalid template1
	/**
	 * @expectedException frame\PageException
	 * @expectedExceptionMessage invalid template
	 */
	public function testInvalidTemplate() {
		$this->object->setTemplate("x");
	}

	// has a settable title through getter and setter methods
	public function testTitleSetterandGetter() {
		$string = "flippityfloppityfloop";
		$this->object->setTitle($string);
		$this->assertEquals($string, $this->object->getTitle());
	}
	
	// should have null template by default
	public function testNullTemplateByDefault() {
		$this->assertNull($this->object->getTemplate());
	}
	
	// set valid template
	public function testHTML5Template(){
		require_once(FRAME_PATH.view.templates.HTML5);
		$template = new frame\HTML5Template();
		$this->object->setTemplate($template);
	}	
}
?>

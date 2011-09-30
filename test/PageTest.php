<?php
require_once("config.php");
require_once(FRAME_PATH.Page);

class PageTest extends PHPUnit_Framework_TestCase {
	public function setup(){
		$object = new frame\Page();
	}
	// should render null when rendering freshly spawned Page

	// should throw exception when Template is not set
	/**
	 * @expectedException PageException
	 * @expectedExceptionMessage template not set
	 */
	public function testExceptionTemplateNotSet() {
		// TODO: add code
	}

	// should throw exception when Content is not set
	/**
	 * @expectedException PageException
	 * @expectedExceptionMessage no content 
	 */
	public function testExceptionNoContent() {
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

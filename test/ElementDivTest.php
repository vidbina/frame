<?php
require_once("config.php");
require_once(FRAME_PATH.ables.Drawable);
require_once(FRAME_PATH.view.elements.Div);

class DivTest extends PHPUnit_Framework_TestCase {
	private $object;

	public function setup(){
		$this->object = new frame\Div("test");
	}

	// must construct when given a valid value
	public function testConstructText() {
		$input = "haha";
		$temp = new frame\Div($input);
		echo($temp->draw());
	}

}
?>

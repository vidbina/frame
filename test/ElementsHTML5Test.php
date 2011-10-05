<?php
require_once("config.php");
require_once(FRAME_PATH.view.Page);
require_once(FRAME_PATH.view.templates.HTML5);

class HTML5Test extends PHPUnit_Framework_TestCase {
	private $page;

	public function setUp(){
		$this->page= new frame\Page();
		$this->page->setTemplate(new frame\HTML5Template());
	}

	// verify that rendered content has opening and closing <html> tags
	public function testBasicRendering() {
		$output = $this->page->render();
		var_dump($output);
		$this->assertContains("<html", $output);
		$this->assertContains("</html>", $output);
	}

	// confirm the existence of the doctype clause
	public function testHasDoctype() {
		$output = $this->page->render();
		$this->assertContains("DOCTYPE", $output);
	}
	
	// confirm proper title
	public function testTitle(){
		$title = "Holland in Da Hood - Pathetic";
		$this->page->setTitle($title);
		$output = $this->page->render();
		$wanted = "<title>".$title."</title>";
		$this->assertContains($wanted, $output);
	}
}
?>

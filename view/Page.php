<?php
/**
 * Copyright 2011 David Asabina
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 **/
namespace frame;

require_once(FRAME_PATH.ables.Renderable);
require_once(FRAME_PATH.ables.Templatable);
require_once(FRAME_PATH.Container);
require_once(FRAME_PATH.view.Template);

class Page extends Container implements Renderable, Templatable {
  // private page fields
  private $title = "Untitled";
	private $properties;
  private $template;
  //private $meta;

  public function __construct(){
    //
  }

  /**
   * renders the page's contents
   */
  public function render(){
    if(!isset($this->template)){
      throw new PageException('template not set');
    }
    // invoke callback
    if(method_exists($this, "onRender")){
      $this->onRender();
    }
    
		// pick up contents from container and generate body
    $pageContent = "";
    foreach($this->getContent() as $item){
      $pageContent .= $this->template->trace($item);
    }
		// wrap the body in the necessary HTML tags
		$pageRender = $this->template->wrap($pageContent, $this);
    return($pageRender);
  }
  
  public function setTemplate($template){
		// TODO: change all is_a's to instanceof?
		//if($template instanceof frame\Template){
		if(is_a($template, 'frame\Template')){
			$this->template = $template;
		}else{
			throw new PageException('invalid template');
		}
  }

  public function getTemplate(){
    return($this->template);
  }

  public function setTitle($title){
    $this->title = $title;
  }

  public function getTitle(){
    return($this->title);
  }
}

class PageException extends \Exception {}
?>

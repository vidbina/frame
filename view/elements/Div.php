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

require_once(FRAME_PATH.ables.Linkable);
require_once(FRAME_PATH.view.Element);
require_once(FRAME_PATH.Container);

class Div extends Element {
	protected $privates;
  protected $content;

  public function __construct($content){
    parent::__construct();
    $this->setContent($content);
    $this->setType("div");
  }

	// TODO: should request drawing instructions from Template
  protected function onDraw(){
		// TODO: fix template issue
		//$output = $template->trace("div", $this->content);
    $output = "<div>".$this->content."</div>";
    return($output);
    /* throw new ElementException('empty div'); */
    /* return false; */
  }
  
	// text-div
  public function setContent($content){
		// always add containers to Div
		// if not passed a container, make it
		if(is_a($content, Container)){
			$this->content = $content;
		} else{
			$temp = new Container();
			$temp->addElement($content);	
			$this->content = $temp;
		}
  }
  public function getContent(){
    return($this->content);
  }

	// container div
  public function addElement($element){
    $this->content->addElement($element); 
  } 
  public function removeElement($element){ 
    $this->content->removeElement($element); 
  } 
  public function purge(){ 
    $this->content->purge(); 
  } 
}
?>

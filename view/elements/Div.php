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

require_once(FRAME_PATH.ables.'Linkable.php');
require_once(FRAME_PATH.view.'Element.php');
require_once(FRAME_PATH.Container);

class Div extends Element {
	protected $privates;
  protected $content;

  public function __construct($content){
    parent::__construct();
    //    $this->container = new Container();
    $this->setContent($content);
    $this->setType("div");
  }

  /**
   * draw the element
   */
	// TODO: should request drawing instructions from Template
  protected function onDraw(){
		$output = $template->trace("div", $this->content);
    $output = "<div>".$this->content."</div>";
    return($output);
    /* throw new ElementException('empty div'); */
    /* return false; */
  }
  
  public function setContent($content){
    $this->content = $content;
  }

  public function getContent(){
    return($this->content);
  }
  /* public function addElement($element){ */
  /*   $this->container->addElement($element); */
  /* } */
  /* public function removeElement($element){ */
  /*   $this->container->removeElement($element); */
  /* } */
  /* public function getContent(){ */
  /*   $this->container->getContent(); */
  /* } */
  /* public function purge(){ */
  /*   $this->container->purge(); */
  /* } */
}
?>

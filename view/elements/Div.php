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

class Div extends Element implements Structurable {
  protected $content;

  public function __construct($content){
    $this->content = $content;
    $this->type = "div";
  }
  /**
   * sets the url to the image resource
   */
  public function setContent($content){
    $this->content = $content;
  }
  /**
   * draw the image
   */
  protected function onDraw(){
    if(!empty($this->content)){
      return("<div>".$this->content."</div>");
    }
    throw new ElementException('empty div');
    return false;
  }

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
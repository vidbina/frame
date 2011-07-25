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

class Hyperlink extends Element implements Linkable {
  protected $link;
  protected $content;

  public function __construct($link, $content){
    parent::__construct();
    $this->setLink($link);
    $this->setContent($content);
  }
  /**
   * sets the link url
   */
  public function setLink($link){
    $this->link = $link;
  }

  /**
   * gets the link url
   */
  public function getLink(){
    return($this->link);
  }

  public function setContent($content){
    $this->content = $content;
  }

  /**
   * draw the image
   */
  protected function onDraw(){
    if(!empty($this->link)){
      return('<a href=\"'.$this->link.'\">'.$this->content.'</a>');
    }
    throw new ElementException('empty imagelink');
    return false;
  }
}
?>
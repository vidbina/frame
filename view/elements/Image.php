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

class Image extends Element {
  protected $image;
  protected $description;
  protected $width;
  protected $height;

  public function __construct($image){
    parent::__construct();
    $this->image = $image;
    $this->setType("image");
  }

  /**
   * draw the image
   */
  protected function onDraw(){
    if(!empty($this->image)){
     return('<img src=\"'.$this->image.'\" alt='.$this->description.'/>');
    }
    throw new ElementException('empty image');
    return false;
  } 

  /**
   * sets the url to the image resource
   */
  public function setSource($target){
    $this->image = $target;
  }

  /**
   * Sets the description for the image, this string will be used as the alt-text
   * @param description the description text for the image
   */
  public function setDescription($description){
    $this->description = $description;
  }


  /**
   * Sets the dimensions for the image resource
   * @param w width
   * @param h height
   */
  public function setDimensions($w, $h){
    $this->setWidth($w);
    $this->setHeight($h);
  }
  
  /**
   * Sets the width of the image resource
   * @param w width
   */
  public function setWidth($w){
    $this->width = $w;
  }

  /**
   * Sets the height of the image resource
   * @param h height
   */
  public function setHeight($h){
    $this->height = $h;
  }

  /**
   * Gets the width of the image resource
   */
  public function getWidth(){
    return($this->width);
  }

  /**
   * Gets the height of the image resource
   */
  public function getHeight(){
    return($this->height);
  }
}
?>
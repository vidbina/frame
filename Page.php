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

require_once(FRAME_PATH.view.'Template.php');
require_once(FRAME_PATH.ables.'Renderable.php');

abstract class Page implements Renderable, Templatable {
  protected $elements = array();
  protected $N;

  public function __construct(){
    //
  }
  public function render(){
    if(!isset($this->template)){
      echo($this->template);
      throw new PageException('template not set');
    }
    if(!isset($elements)){
      throw new PageException('no elements');
    }
    $this->onRender();
    // is returning even necessary?
    return true;
  }
  
  public function addElement($element){
    //N++;
    echo '\nadd page';
  }
  
  public function removeElement($element){
    //N--;
    echo '\nremove page';
  }

  public function purge(){
    echo '\npurge page';
  }

  // TODO: design class which defines template methods
  public function setTemplate($template){
    echo("\nsetting template: ");
    var_dump($template);
    echo("\n\n");
    $this->template = $template;
  }

  public function getTemplate(){
    return($this->template);
  }

  abstract protected function onRender();
  /**
  abstract protected onAddElement();
  abstract protected onRemoveElement();
  abstract protected onPurge();
   **/
  }

class PageException extends \Exception {}
?>
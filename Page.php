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

require_once(FRAME_PATH.'ables/Renderable.php');
require_once(FRAME_PATH.'view/Template.php');

abstract class Page implements Renderable {
  protected $template;
  protected $elements = array();
  protected $N;

  public function __construct(){
    //
  }
  public function render(){
    echo '\nrender page';
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

  /**
  abstract protected onRender();
  abstract protected onAdd();
  abstract protected onRemove();
  abstract protected onPurge();
   **/
}
?>
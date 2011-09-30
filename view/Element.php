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

require_once(FRAME_PATH.ables.Drawable);

abstract class Element implements Drawable, Templatable, Styleable{
  protected $type;
  protected $template;
	protected $style;
  // host as context?
  protected $host;

  public function __construct(){
    $this->visibility = Drawable::VISIBLE;
    
  }

  public function setContext($context){
    $this->host = $context;
  }

	// drawable
  public function draw(){
    if($this->visibility == Drawable::VISIBLE){
      return($this->onDraw());
    }
    return false;
  }

  public function setVisibility($visibility){
    if($visibility != Drawable::VISBILE ||
       $visibility != Drawable::HIDDEN){
      throw new ElementException('invalid visibility');
      return false;
    }
    $this->visibility = $visibility;
    return true;
  }

  public function getType(){
    return($this->type);
  }

  public function setType($type){
    /* // TODO: write checkType for template */
    /* if(!$template::checkType($type)){ */
    /*   throw new ElementException('invalid type'); */
    /*   return false; */
    /* } */
    $this->type = $type;
    return true;
  }

	// templatable properties
  public function setTemplate($template){
    $this->template = $template;
		return true;
  }

  public function getTemplate(){
    return($this->template);
  }

  public function updateTemplate(){
    if(method_exists($this->host->getTemplate())){
      $this->setTemplate($this->host->getTemplate());
			return true;
    }
		return false;
  }

	// styleable properties
	public function setStyle($style){
		$this->style = $style;
	}
	public function clearStyle(){
		$this->style = null;
	}
	public function getStyle(){
		return $style ? ($style != "" || $style != null) : null
	}

  abstract protected function onDraw();
}

class ElementException extends \Exception {}
?>

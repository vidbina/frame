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

require_once(FRAME_PATH.view.Template);

require_once(FRAME_PATH.view.Element);
// HTML5 elements
//require_once(FRAME_PATH.view.elements.Hyperlink);
require_once(FRAME_PATH.view.elements.Image);
require_once(FRAME_PATH.view.elements.Div);

class HTML5Template extends Template {
  protected $charset;
  protected $lang;
  protected $meta;

  public function __content(){
    // no-op
  }

  /**
   * trace the given Element type with the appropriate content
   */
  public function trace($item){
    $output = "";
		$specifics = "";
    // handle Element objects
    if(is_a($item, 'frame\Element')){
      // handle HTML5 elements
      switch($item->getType()){
      case 'div':
	$output .= '<div'.$specifics.'>'.$item->getContent().'</div>';
				break;
      case 'hyperlink':
	$output .= '<a href=\"'.$item->getLink().'\"'.$specifics.'>'.$item->getContent().'</a>';
				break;
      case 'image':
	$output .= '<img src=\"'.$item->getSource().'\" alt=\"'.$item->getDescription().'\"'.$specifics.'/>';
				break;
			case 'page':
	$output .= '<html>'.'</html>';
				break;
      default:
				break;
      }
      //'<img src=\"'.$this->image.'\" alt='.$this->description.'/>'
      //'<a href=\"'.$this->link.'\">'.$this->content.'</a>'
      //'<div>.$this->content.</div>'
      //$output .= "\n".$item->draw();
    }
    return($output);
  }

  public function wrap($content){
		/*$doctype = "<!DOCTYPE html>"; 
    $head = "<head><meta charset=\"utf-8\" /><title>".$data["title"]."</title></head>";
    $body = "<body>".$data["body"]."</body>"; 
    $page = "<html lang="en"></html>"; */
  }
  /**
   *
   */
  public function addElement($element){
  }
  
  public function removeElement($element){
  }
}
?>

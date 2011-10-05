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

// RETHINK!!!
// are elements added to templates or simply to pages based on the instructions,
// as dictated by the template???
// might end up redesigning the structure of the frame to incorporate template-based
// page structures rather then template-comprised pages.

abstract class Template {
  protected $template;
  protected $types;
  protected $charset = "utf-8";

  public function checkType($type){
    
  }
  
  public function getTypes(){
    return($types);
  }

  abstract public function trace($item);
	// details will refer to the details set to container
	// e.g. for webpages the details will be contained within
	// the Page object by passing the Page to the wrap method
	// wrap will be capable of picking up the title, style information
	// and other mandatory data.
	// HTML pages will need to return head, title, link and style tags
	// which will be included into the HTML-friendly Page object.
	// in that case the Page object might need 
	// getStyles, getTitle and getScripts information.
	abstract public function wrap($content, $details);
	// deprecated... I don't see how one can add an element to a template
	// abstract public function addElement($element);
  // abstract public function removeElement($element);
}
?>

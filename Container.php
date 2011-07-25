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

require_once(FRAME_PATH.ables.Structurable);

/**
 * Containment object for different Elements
 * @author: David Asabina
 * @date: Jul 19, 2011
 * Elements are stored into a common elements array.
 * All containing Elements are hierarchical structured
 * into the main array as sub-arrays.
 */
class Container implements Structurable{
  protected $contents = array();

  /**
   * Adds a element to the container
   * @param element the element or elementgroup to be added
   * @return the element's id on success, NULL on fail
   * @see removeElement()
   */
  public function addElement($element){
    if($element == NULL){
      throw new EmptyElementException('futile to add NULL element');
    }
    // rearrange array to clean up blank array locations
    array_values($this->contents);
    // add new element into array
    $this->contents[] = $element;
    return(key($this->contents));
  }

  /**
   * Removes the element with the given id from container
   * @param element the element to be removed
   * @return true on success, false on fail
   * @see addElement()
   */
  public function removeElement($element){
    if($element == NULL){
      throw new EmptyElementException('attempt to remove NULL element');
    }
    unset($this->contents[$element]);
  }

  /**
   * Returns the content of the container
   * @return content of the container, whatever that may be
   */
  public function getContent(){
    return($this->contents);
  }

  /**
   * remove all Elements from container
   * @return boolean
   */
  public function purge(){
    unset($elements);
  }
}

// TODO: write Element class and add this exception to that class
class EmptyElementException extends \Exception{}

?>
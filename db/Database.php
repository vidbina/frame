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

require_once(FRAME_PATH.Connection);

abstract class Database extends Connection {
  public function __construct(){
    echo("\ndatabase");
  }

  public function query($string){
    if(method_exists($this, 'onQuery')){
      $this->onQuery();
    }
  }

  abstract protected function onQuery($string);
}

class DatabaseException extends \Exception {}
?>
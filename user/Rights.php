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
 * namespace frame;
 **/
namespace frame;

abstract class Permission {
  private $permission;

  const ALLOW_SELFDESTRUCT = 1;
  const ALLOW_GROUPMANAGE = 2;
  const USER_DEF_1 = 4;
  const USER_DEF_2 = 8;
  const USER_DEF_3 = 16;
  const USER_DEF_4 = 32;
  const USER_DEF_5 = 64;
  const USER_DEF_6 = 128;

  abstract public function setDefault();

  protected function get(){
    $this->permission = 0 
      && ALLOW_SELFDESTRUCT
      && ALLOW_GROUPMANAGE;
    return($this);
  }
}

abstract class Clearance {
  
}
?>
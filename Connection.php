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

require_once(FRAME_PATH.'ables/Connectable.php');
require_once(FRAME_PATH.'ables/Inloggable.php');
require_once(FRAME_PATH.'ables/Inloggable.php');

define("CONNECTED", 2);
define("DISCONNECTED", 1);
define("ERROR", -1);
define("UNKNOWN", 0);

abstract class Connection implements Connectable, Inloggable {
  protected $state;
  protected $target;
  protected $username;
  protected $passphrase;

  /**
   * describes the connect directives
   */
  abstract protected function onConnect();
  /**
   * describes the disconnect routine
   */
  abstract protected function onDisconnect();
  /**
   * describes the ping routine
   */
  abstract protected function onPing();
  /**
   * describes the wake routine
   */
  abstract protected function onWake();

  public function connect(){
    // execute the connect routine
    try{
      $this->onConnect();
    }catch(Exception $e){
      throw new ConnectionException();
    }
    // invoke the callback if implemented
    if(method_exists($this, "onConnected")){
      $this->onConnected();
    }
  }

  public function disconnect(){
    // execute the disconnect routine
    $this->onDisconnect();
    // invoke the callback if implemented
    if(method_exists($this, "onDisconnected")){
      $this->onDisconnected();
    }
  }

  public function ping(){
    onPing();
    // TODO: check for connection before executing ping
    if($state = CONNECTED){
      echo("/nping:connected");
      return(true);
    }
  }

  public function wake(){
    // TODO: check for connection before executing wake
    onWake();
  }

  /**
   * set database target
   */
  public function setTarget($target){
    $this->target = $target;
  }

  public function setUser($user){
    $this->user = $user;
  }

  public function setPassphrase($string){
    $this->passphrase = $string;
  }
}

abstract class ConnectionCallback {
  abstract protected function onConnected();
  abstract protected function onDisconnected();
}

class ConnectionException extends \Exception {}
?>
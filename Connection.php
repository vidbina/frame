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

require_once(FRAME_PATH.ables.Connectable);
require_once(FRAME_PATH.ables.Inloggable);
require_once(FRAME_PATH.User);

abstract class Connection implements Connectable, Inloggable {
  protected $state;
  protected $target;
  protected $user;

	public function __construct(){
		$this->user = new frame\User();
	}
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

  /**
   * this method pretty damn obvious, I suppose
   */
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

  /**
   * another one that speaks for itself
   */
  public function disconnect(){
    // execute the disconnect routine
    try{
      $this->onDisconnect();
    }catch(Exception $e){
      throw new ConnectionException();
    }
    // invoke the callback if implemented
    if(method_exists($this, "onDisconnected")){
      $this->onDisconnected();
    }
  }

  /**
   * checks whether a valid connection is known to the object
   */
  public function ping(){
    onPing();
    // TODO: check for connection before executing ping
		return ($state == Connectable::CONNECTED) ? true : false;
  }

  /**
   * reanimate the connection if dead, needs some serious thought
   */
  public function wake(){
    onWake();
    if($state = Connectable::UNKNOWN){
      this.connect();
    }
		// TODO: what is PostWake?
    //onPostWake();
  }

  /**
   * set database target
   */
  public function setTarget($target){
    $this->target = $target;
  }

  public function setUser($user){
		if(is_a($user, 'frame\User') && $user != null){
				var_dump("orgeona");
			// do not set blank usernames
			if($user->getUsername == ""){
				throw new UserException("blank username");
			} else {
		    $this->user = $user;
			}
		}else{
			var_dump("invalid");
			throw new UserException("invalid user");
		}
  }
	
	public function setUsername($string){
		//$this->user->setUsername($string);
		var_dump($this->user);
	}

	public function setPassphrase($string){
		//$this->user->setPassphrase($string);
	}

	public function setUserCredentials($user, $pass){
		$this->user->setUserCredentials($user, $pass);
	}
}

class ConnectionException extends \Exception {}
?>

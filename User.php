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

require_once(FRAME_PATH.ables.Inloggable);

/**
 * Wrapper for User information and actions
 * @author: David Asabina
 */
abstract class User implements Inloggable {
  protected $username;
  protected $passphrase;

	public function __construct($name, $pass){
		$this->setUserCredentials($name, $pass);
	}

	// setters
  public function setUsername($string){
    $this->username = $string;
    $this->callOnChange();
  }

  public function setPassphrase($string){
    $this->passphrase = $string;
    $this->callOnChange();
  }

  public function setUserCredentials($user, $pass){
    $this->username = $user;
    $this->passphrase = $pass;
    $this->callOnChange();
  }

	// getters
	public function getUsername(){
		return $this->username;
	}

	public function getPassphrase(){
		return $this->passphrase;
	}

	// callback invokers
	/**
	 * invoke callback upon change of user credentials
	 */ 
  protected function callOnChange(){
    if(method_exists($this, 'onChange')){
      $this->onChange();
    }
  }

	/**
	 * Primitively check user creds for validity
	 * RULE: user name can never be blank
	 * Call the validation callback upon request for validation
	 */
  public function validate(){
    if(empty($this->username)){
      throw new UserException("cannot validate the nonexisting");
      return false;
    }

    try{
      return $this->onValidate();
    }catch(\Exception $e){
      $this->onFail($e);
    }
  }

	/**
	 * Terminate a User's subscription
	 */
  public function terminate(){
    if(empty($this->username)){
      throw new UserException('cannot terminate ghost user');
      return false;
    }

    try{
      return $this->onTerminate();
    }catch(\Exception $e){
      return $this->onFail($e);
    }
  }

	/**
	 * Subscribe a User
	 */
  public function subscribe(){
		if(empty($this->username)){
			throw new UserException('will not create ghosts');
		}

    try{
      return $this->onSubscribe();
    }catch(\Exception $e){
      return $this->onFail($e);
    }
  }

	/**
	 * Modify a User's data (password/username change)
	 */
  public function modify($data){
    try{
      $this->onModify($data);
    }catch(\Exception $e){
      $this->onFail($e);
    }
  }

  abstract protected function onValidate();
  abstract protected function onTerminate();
  abstract protected function onSubscribe();
  abstract protected function onModify($data);

	abstract protected function salt($data);
}

abstract class UserCallback {
  abstract protected function onChange();
  abstract protected function onFail($exception);
}

class UserException extends \Exception {}
?>

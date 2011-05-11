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

abstract class User implements Inloggable {
  protected $username;
  protected $passphrase;

  public function setUser($string){
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

  protected function callOnChange(){
    if(method_exists($this, 'onChange')){
      $this->onChange();
    }
  }

  public function validate(){
    if(empty($this->username) || empty($this->passphrase)){
      throw new UserException('empty password/username');
      return false;
    }

    try{
      $this->onValidate();
    }catch(\Exception $e){
      $this->onFail($e);
    }
  }

  public function terminate(){
    if(empty($this->username) || empty($this->passphrase)){
      throw new UserException('empty password/username');
      return false;
    }

    try{
      $this->onTerminate();
    }catch(\Exception $e){
      $this->onFail($e);
    }
  }

  public function subscribe(){
    if(empty($this->username) || empty($this->passphrase)){
      throw new UserException('empty password/username');
      return false;
    }

    try{
      $this->onSubscribe();
    }catch(\Exception $e){
      $this->onFail($e);
    }
  }

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
}

abstract class UserCallback {
  abstract protected function onChange();
  abstract protected function onFail($exception);
}

class UserException extends \Exception {}
?>

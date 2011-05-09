<?php
namespace frame;

require_once(FRAME_PATH.'ables/Inloggable.php');

abstract class User implements Inloggable {
  protected $username;
  protected $password;

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
    $this->passphrase = $string;
    $this->callOnChange();
  }

  protected function callOnChange(){
    if(method_exists($this, 'onChange')){
      $this->onChange();
    }
  }

  public function validate(){
    try{
      $this->onValidate();
    }catch(\Exception $e){
      $this->onFail($e);
    }
  }

  public function terminate(){
    try{
      $this->onTerminate();
    }catch(\Exception $e){
      $this->onFail($e);
    }
  }

  public function subscribe(){
    try{
      $this->onSubscribe();
    }catch(\Exception $e){
      $this->onFail($e);
    }
  }

  abstract protected function onValidate();
  abstract protected function onTerminate();
  abstract protected function onSubsribe();
}

interface UserCallback {
  protected function onChange();
  protected function onFail($exception);
}

class UserException extends \Exception {}
?>
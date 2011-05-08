<?php
namespace frame;

require_once(FRAME_PATH.'ables/Connectable.php');
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
      throw new ConnectionException($e);
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

interface ConnectionCallback {
  public function onConnected();
  public function onDisconnected();
}

class ConnectionException extends \Exception {}
?>
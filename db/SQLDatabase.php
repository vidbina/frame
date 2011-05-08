<?php
namespace frame;

require_once(FRAME_PATH.'Database.php');
define(SQL_DEFAULT_PATH, 'localhost');
define(SQL_DEFAULT_USER, 'admin');
define(SQL_DEFAULT_PASS, 'passw');

class SQLDatabase extends Database {
  //  public function connect(){
  //    echo("\nhaha");
  //  }
  private $link;
  
  public function __construct($path){
    // set default path if empty argument is passed
    if(empty($path)){
      $path = SQL_DEFAULT_PATH;
    }
    // write values to object
    $this->setTarget($path);
    $this->setUser(SQL_DEFAULT_USER);
    $this->setPassphrase(SQL_DEFAULT_PASS);
  }

  protected function onConnect(){
    $this->link = mysql_connect($target, $user, $passphrase);
    if(!link){
      return(false);
    }
    return(true);
  }

  protected function onDisconnect(){
    if($this->link){
      mysql_close($this->link);
      return(true);
    }
    return(false);
  }
  
  protected function onPing(){
    echo("\nping");
  }
  
  protected function onWake(){
    echo("\nwake");
  }

  public function query($string){
    if(!link){ return false; }
    echo($string);
    return(mysql_query($string));
  }

  public function validate(){
    echo("\nvalidate");
  }

  public function terminate(){
    echo("\nterminate");
  }

  public function subscribe(){
    echo("\nsubscribe");
  }
}

class SQLPathException extends \Exception {}
class SQLQueryException extends \Exception {}
?>
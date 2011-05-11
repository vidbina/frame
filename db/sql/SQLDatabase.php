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

require_once(FRAME_PATH.db.Database);

// TODO: find out where best to place such information, should be customizable
define('SQL_DEFAULT_PATH', 'localhost');
define('SQL_DEFAULT_USER', 'admin');
define('SQL_DEFAULT_PASS', 'passw');

class SQLDatabase extends Database {
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

  public function onQuery($string){
    echo("\nquery");
  }
}

class SQLPathException extends \Exception {}
class SQLQueryException extends \Exception {}
?>
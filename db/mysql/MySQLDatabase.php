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
require_once(FRAME_PATH.db.mysql.MySQLUser);

define('SQL_DEFAULT_PATH', 'localhost');

class MySQLDatabase extends Database {
  private $link;
  
  public function __construct($path){
    // set default path if empty argument is passed
    if(empty($path)){
      $path = SQL_DEFAULT_PATH;
    }
    // write values to object
    $this->setTarget($path);
    $this->setUser(new MySQLUser("", ""));
		// TODO: set default to UNKNOWN or DISCONNECTED?
		$this->setState(Connectable::UNKNOWN);
  }

 protected function onConnect(){
    $this->link = mysql_connect($this->target, 
			$this->user->getUsername(), 
			$this->user->getPassphrase());
    if(!$this->link){
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
		// TODO: add code
  }
  
  protected function onWake(){
		// TODO: add code
  }

	// querries the database
  public function query($string){
    if(!link){ 
			return false; 
		}
    return(mysql_query($string));
  }

	// implementation of Inloggable methods
  public function validate(){
		$this->user->validate();
  }

	// terminate the connection
  public function terminate(){
    echo("\nterminate");
  }

  public function subscribe(){
    echo("\nsubscribe");
  }

	// implementation of Database methods
  public function onQuery($string){
    echo("\nquery");
  }
}

class SQLPathException extends \Exception {}
class SQLQueryException extends \Exception {}
?>

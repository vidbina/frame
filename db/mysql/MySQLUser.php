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

require_once(FRAME_PATH.User);

define('SQL_DEFAULT_USER', 'admin');
define('SQL_DEFAULT_PASS', 'chickenwing');

class MySQLUser extends User {
  
	/**
	 * Constructs a default User object and adds the 
	 * MySQLUser default values to a blank User
	 */
  public function __construct($user, $password){
		$u = (!empty($user)) ? $user : SQL_DEFAULT_USER;
		$p = (!empty($password)) ? $password: SQL_DEFAULT_PASS;
		
		parent::__construct($u, $p);
  }

	// callbacks for the common Inloggable methods
  protected function onValidate(){
		// TODO: add code
  }

  protected function onTerminate(){
		// TODO: add code
  }

  protected function onSubscribe(){
		// TODO: add code
  }

	// salting scheme for this specific user class
	protected function salt($data){
		// TODO: add code
	}

  protected function onModify($data){
		// TODO: add code
  }
	
	protected function onChange(){
		if($this->getUsername() == ""){
			throw new SQLUserException("no blank usernames");
		}
	}
}

class SQLUserException extends UserException{}

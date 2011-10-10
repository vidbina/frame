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

// TODO: find out where to best place such information, should be customizable

class MySQLUser extends User {
  
  public function __construct(){
    $this->setUserCredentials(SQL_DEFAULT_USER, SQL_DEFAULT_PASS);
  }

	// setters are forced required by extension

	// getters to accompany the setters
	public function getUsername(){
		return $this->username;
	}
	public function getPassphrase(){
		return $this->passphrase;
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
}

class SQLUserException extends UserException{}

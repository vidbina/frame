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

// silkFrame 0.1
// date: May 11, 2011

namespace frame;
// frame root folder
// FRAM_PATH should be manually configured by developer
//define('FRAME_PATH', 'php/frame/');
//define('FRAME_PATH', './');
// defines filenames to the basic elements
define('Connection', 'Connection.php');
define('User', 'User.php');
define('Page', 'Page.php');
define('Container', 'Container.php');

// the ables directories
define('ables', 'ables/');
{
  define('Connectable', 'Connectable.php');
  define('Drawable', 'Drawable.php');
  define('Inloggable', 'Inloggable.php');
  define('Linkable', 'Linkable.php');
  define('Queryable', 'Queryable.php');
  define('Renderable', 'Renderable.php');
  define('Templatable', 'Templatable.php');
  define('Structurable', 'Structurable.php');
	define('Styleable', 'Styleable.php');
}

// the db directories
define('db', 'db/');
{
  define('Database', 'Database.php');

	define('MySQL', 'mysql/all.php');
  define('mysql', 'mysql/');
  {
    define('MySQLDatabase', 'MySQLDatabase.php');
    define('MySQLUser', 'MySQLUser.php');
  }
}

// the modules directories
define('modules', 'modules/');

// the user directories
define('user', 'user/');
{
  define('Rights', 'Rights.php');
  define('UserManager', 'UserManager.php');
}

// the view directories
define('view', 'view/');
{
  define('Element', 'Element.php');
  define('Template', 'Template.php');
  define('elements', 'elements/');
  {
    define('Hyperlink', 'Hyperlink.php');
    define('Image', 'Image.php');
    define('Div', 'Div.php');
  }
  define('templates', 'templates/');
  {
    define('HTML5', 'HTML5.php');
  }
}
 
?>

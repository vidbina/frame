<?php
namespace frame;

require_once(FRAME_PATH.'Connection.php');

abstract class Database extends Connection {
  public function __construct(){
    echo('\ndatabase');
  }

  abstract public function query($string);
}

?>
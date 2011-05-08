<?php
namespace frame;

interface Connectable {
  /**
   * connects to the resource
   */
  public function connect();
  /**
   * disconnects from the resource
   */
  public function disconnect();
  /**
   * verify the validity of a connection
   */
  public function ping();
  /**
   * reanimate connection if dead
   */
  public function wake();
}
?>
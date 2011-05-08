<?php
namespace frame;

interface Inloggable {
  /**
   * sets the username
   */
  public function setUser($string);
  /**
   * sets the passphrase
   */
  public function setPassphrase($string);
  /**
   * validates the username/passphrase combination
   */
  public function validate();
  /**
   * removes the username/passphrase combination
   */
  public function terminate();
  /**
   * adds the username/passphrase combination
   */
  public function subscribe();
}
?>
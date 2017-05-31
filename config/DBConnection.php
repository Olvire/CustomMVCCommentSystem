<?php

/**
 * Description of DBConnection
 *
 * @author waseem.mansha
 */
class DBConnection {

  public $con;
  private static $_instance;

  private function __construct() {
    try {
//      $conStr = Config::$dbConig['engine'].':'.Config::$dbConig['host'].';'.'dbname='.  Config::$dbConig['database'];
      $con = Config::$dbConig['engine'].':host='.Config::$dbConig['host'].';'.'dbname='.  Config::$dbConig['database'];
      
      $this->con = new PDO($con, Config::$dbConig['user'], Config::$dbConig['password']);
      $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public static function getInstance() {
    if (!(self::$_instance instanceof self)) {
      self::$_instance = new self();      
    }
    return self::$_instance;
  }

}

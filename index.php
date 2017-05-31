<?php

require './config/Bootstrap.php';

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('VIEWS_ROOT', ROOT . DS . 'views' . DS);
define('HOME_ACTION', 'post/index');

final class IndexPage {

  private $router;
  private $bootstrap;

  function __construct() {
    $this->bootstrap = new Bootstrap();
  }

  public function init() {
    // error reporting - all errors for development (ensure you have display_errors = On in your php.ini file)
    error_reporting(E_ALL | E_STRICT);
    mb_internal_encoding('UTF-8');
//    set_exception_handler(array($this, 'handleException'));
    spl_autoload_register(array($this->bootstrap, 'loadClass'));
    // session
    session_start();
  }

  function load() {
    $this->router = new Router();
    $content = $this->router->loadControllerAction();
    include_once 'views/layout/layout.phtml';
  }

}

$index = new IndexPage();
$index->init();
$index->load();
?>


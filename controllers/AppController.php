<?php

class AppController {

  function __construct() {
    
  }

  function set($data, $view) {
    include_once($view);
  }

  function render($view, $variables = array()) {
    extract($variables);
    ob_start();
    include $view . '.php';
    $renderedView = ob_get_clean();
    return $renderedView;
  }

}

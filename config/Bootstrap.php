<?php

final class Bootstrap {

  const CONFIG_DIR = 'config/';
  const VIEWS_DIR = 'views/';
  const LAYOUT_DIR = 'views/layout/';
  const MODELS_DIR = 'models/';
  const CONTROLLER_DIR = 'controllers/';
  const UTILS_DIR = 'utilities/';

  public function loadClass($name) {
    $classes = array(
      'Config' => self::CONFIG_DIR . 'Config.php',
      'DBConnection' => self::CONFIG_DIR . 'DBConnection.php',
      'Router' => self::CONFIG_DIR . 'Router.php',
      'AppController' => self::CONTROLLER_DIR . 'AppController.php',
      'PostController' => self::CONTROLLER_DIR . 'PostController.php',
      'CommentController' => self::CONTROLLER_DIR . 'CommentController.php',
      'AppModel' => self::MODELS_DIR . 'AppModel.php',
      'CommentModel' => self::MODELS_DIR . 'CommentModel.php',
      'PostModel' => self::MODELS_DIR . 'PostModel.php',
      'Utils' => self::UTILS_DIR . 'Utils.php',
    );
    if (!array_key_exists($name, $classes)) {
      die('Class "' . $name . '" not found.');
    }
    require_once $classes[$name];
  }

}

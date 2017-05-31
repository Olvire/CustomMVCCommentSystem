<?php

class Router {

  function parseRequestParams($page) {
    $params = array();
    if (!empty($page)) {
      $url_params = explode('/', $page);
      if (isset($url_params[0]) && isset($url_params[1])) {
        $params['controller'] = ucfirst($url_params[0]) . 'Controller';
        $params['action'] = $url_params[1];
        if (isset($url_params[2])) {
          $params['id'] = $url_params[2];
        }
      }
    }
    return $params;
  }

  function loadControllerAction() {
    if (isset($_GET['page'])) {
      $request_params = $this->parseRequestParams($_GET['page']);
      if (!empty($request_params)) {
        $controller = new $request_params['controller']();        
        $id = isset($request_params['id'])? $request_params['id']:'';
        
        return $controller->$request_params['action']($id);
      }
    } else {
      Utils::redirect();
    }
  }

}

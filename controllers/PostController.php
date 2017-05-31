<?php

class PostController extends AppController {

  private $post;
  private $table;

  function __construct() {
    $this->post = new PostModel();
    $this->table = 'posts';
    $this->views = VIEWS_ROOT . 'post' . DS;
  }

  function validate() {
    $erors = array();
    foreach ($_POST['post'] as $key => $value) {
      if (empty($value)) {
        $erors['post'][$key] = '* Field is required';
      }
    }
    if (!filter_var($_POST['post']['email'], FILTER_VALIDATE_EMAIL)) {
      $erors['post']['email'] = "* Invalid email format";
    }
    return $erors;
  }

  public function index() {
    $data = $this->post->getAll($this->table);
    return $this->render($this->views . __FUNCTION__, array('data' => $data));
  }

  public function add() {
    $data = array();
    if (!Utils::isRequestPost()) {
      return $this->render($this->views . __FUNCTION__, array('data' => $data));
    } else {
      $data = $_POST['post'];
      $error = $this->validate();
      if ($error) {
        return $this->render($this->views . __FUNCTION__, array('data' => $data, 'error' => $error));
      } else {
        $id = $this->post->create($data);
        Utils::redirect('post/index');
      }
    }
  }

  public function view($id) {
    $data = $this->post->findById($this->table, $id);
    return $this->render($this->views . __FUNCTION__, array('data' => $data));
  }

  public function delete($id) {
    if ($id > 0) {
      $this->post->delete($this->table, $id);
    }
    Utils::redirect('post/index');
  }

}

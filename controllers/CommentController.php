<?php

class CommentController extends AppController {

  private $model;
  private $table;
  private $views;

  function __construct() {
    $this->model = new CommentModel();
    $this->table = 'comments';
    $this->views = VIEWS_ROOT . 'comment' . DS;
  }

  function validate() {
    $erors = array();
    foreach ($_POST['comment'] as $key => $value) {
      if (empty($value)) {
        $erors['comment'][$key] = '* Field is required';
      }
    }

    return $erors;
  }

  function index($post_id) {
    $page_size = 2;
    $page_no = $_GET['p_indx'];
    $c_page = 0;
    if ($page_no > 1) {
      $c_page = ($page_no - 1) * $page_size;
    }
    $data = $this->model->findByPostId($this->table, $post_id, $c_page, $page_size);
    echo $this->render($this->views . __FUNCTION__, array('data' => $data));
    exit;
  }

  function add() {
    $error = $this->validate();
    if (!$error) {
      $data = $_POST['comment'];
      if ($this->model->create($data)) {
        echo 'success';
        exit();
      }
    }
    echo 'error';
    exit();
  }

}

<?php

class PostModel extends AppModel {

  protected $table = 'posts';

  function __construct() {
    parent::__construct();
  }

  function create($data) {
    $data = $this->prepareParams($data);
    $date = date('Y-m-d H:i:s');
    $data['active'] = 1;
    $data['user_id'] = 1;
    $data['created'] = $date;
    $data['modified'] = $date;
    return $this->insert($this->table, $data);
  }

}

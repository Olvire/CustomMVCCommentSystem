<?php

class CommentModel extends AppModel {

  protected $table = 'comments';

  function __construct() {
    parent::__construct();
  }

  function findByPostId($table, $id,$c_page,$page_size) {
    $sql = "SELECT * FROM {$table} WHERE post_id = " . (int) $id." ORDER BY created DESC limit {$c_page} , {$page_size}";
    
    $data = $this->db->con->query($sql, PDO::FETCH_ASSOC)->fetchAll();
    return $data;
  }

  function create($data) {
    $date = date('Y-m-d H:i:s');
    $data['user_id'] = 1;
    $data['created'] = $date;    
    return $this->insert($this->table, $data);
  }

}

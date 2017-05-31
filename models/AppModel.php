<?php


class AppModel {

  //put your code here

  public $db;

  public function __construct() {
    $this->db = DBConnection::getInstance();
  }

  public function getAll($table) {
    try {
      $stmt = $this->db->con->prepare("SELECT * FROM {$table} Order By created DESC");
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
      exit;
    }
  }

  function prepareParams($param) {
    $n21_params = array();
    foreach ($param as $key => $value) {
      $entity_elm1 = htmlentities($value);
      $n21_params[$key] = mysql_real_escape_string($entity_elm1);
    }
    return $n21_params;
  }

  public function insert($table, $param) {
    $placeholder = array();
    for ($i = 0; $i < count($param); $i++) {
      $placeholder[] = '?';
    }
    $sql = 'INSERT INTO ' . $table . ' (' . implode(", ", array_keys($param)) . ') ';
    $sql.= 'VALUES (' . implode(", ", $placeholder) . ')';
    $stmt = $this->db->con->prepare($sql);
    $stmt->execute(array_values($param));
    return $this->db->con->lastInsertId();
  }

  public function findById($table, $id) {
    $sql = "SELECT * FROM {$table} WHERE active = 1 and id = " . (int) $id;
    $data = $this->db->con->query($sql, PDO::FETCH_ASSOC)->fetch();
    return $data;
  }

  public function delete($table, $id) {
    $sql = "DELETE FROM {$table} WHERE id = " . (int) $id;
    $data = $this->db->con->exec($sql);      
    return $data;
  }

}

<?php

class Page
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function getAllNfts()
   {
      $this->db->query('SELECT *,
                        orders.id as orderId,
                        sales.id as saleId,
                        orders.created_at as orderCreated,
                        sales.created_at as saleCreated
                        FROM sales
                        INNER JOIN orders
                        ON orders.id = sales.id
                        ORDER BY orders.created_at DESC
                        ');
      return $this->db->resultSet();
      // return $result;
   }

   // ====GET ALL RECORDS====
   public function getAll($table, $orderby)
   {
      $this->db->query("SELECT * FROM $table ORDER BY $orderby DESC");
      return $this->db->resultSet();
   }

   public function deleteAll($table)
   {
      $this->db->query("DELETE FROM `$table`");
      return $this->db->resultSet();
   }

   public function delete($table, $col, $param)
   {
      $this->db->query("DELETE FROM `$table` WHERE `$col` = '$param' LIMIT 1");
      return $this->db->singleSet();
   }

   public function getRoomsWhere($table, $col, $param, $orderby)
   {
      $this->db->query("SELECT * FROM `$table` WHERE `$col`='$param' ORDER BY `$orderby` DESC");
      return $this->db->resultSet();
   }

   // SELECT ALL WHERE WITH LIMIT RANDOM
   public function select_where_rand_limit($table, $col, $param, $limit)
   {
      $this->db->query("SELECT * FROM $table WHERE $col='$param' ORDER BY RAND() DESC LIMIT $limit");
      return $this->db->resultSet();
   }

   // SELECT ALL WITH LIMIT RANDOM
   public function select_rand_limit($table, $limit)
   {
      $this->db->query("SELECT * FROM $table ORDER BY RAND() DESC LIMIT $limit");
      return $this->db->resultSet();
   }

   // SELECT ALL WITH LIMIT RANDOM
   public function select_Where_orderby($table, $col, $param, $orderby)
   {
      $this->db->query("SELECT * FROM `$table` WHERE `$col`='$param' ORDER BY `$orderby` DESC");
      return $this->db->resultSet();
   }

   public function selectWhereAnd($table, $col, $param, $cols, $params)
   {
      $this->db->query("SELECT * FROM $table WHERE $col = '$param' AND $cols = '$params'");

      return $this->db->singleSet();
   }

   // SELECT ALL WITH WHERE CLAUSE
   public function selectWhere($table, $col, $param, $orderby)
   {
      $this->db->query("SELECT * FROM $table WHERE $col = '$param' ORDER BY $orderby DESC");

      return $this->db->resultSet();
   }
   // SELECT ALL WITH WHERE CLAUSE LIMIT
   public function selectLimit($table, $col, $param, $limit)
   {
      $this->db->query("SELECT * FROM $table WHERE $col = '$param' LIMIT $limit");

      return $this->db->singleSet();
   }

   // SELECT ALL WHERE
   public function select_Where($table, $col, $param)
   {
      $this->db->query("SELECT * FROM `$table` WHERE `$col`='$param' LIMIT 1");
      return $this->db->resultSet();
   }

   // SELECT DISTINCT WHERE CLAUSE
   public function selectDistinctWhere($col, $table, $cols, $param)
   {
      global $con;
      $stmt = $con->prepare("SELECT DISTINCT $col FROM $table WHERE $cols='$param' ORDER BY `price` ASC");
      $stmt->execute();
      return $stmt->get_result();
   }

   public function filterRooms($table, $col1, $param1, $col2, $param2, $col3, $param3, $orderby)
   {
      $this->db->query("SELECT * FROM `$table` WHERE `$col1`='$param1' AND `$col2`='$param2' AND `$col3` 
      >='$param3' ORDER BY `$orderby` ASC");
      return $this->db->resultSet();
   }
}

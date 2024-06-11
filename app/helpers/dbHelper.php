<?php
function selectWhere($table, $col, $param)
{
   global $con;
   $sql = $con->query("SELECT * FROM $table WHERE $col='$param'");
   return $sql;
}

function selectLimit($table, $col, $param)
{
   global $con;
   $sql = $con->query("SELECT * FROM $table WHERE $col='$param' LIMIT 1");
   return $sql;
}

function deleteF($table, $col, $param)
{
   global $con;
   $sql = $con->query("DELETE FROM $table WHERE $col='$param' LIMIT 1");
   return $sql;
}

function insertF($table, $cols, $values)
{
   global $con;
   $sql = $con->query("INSERT INTO $table($cols) VALUES($values)");

   // $sql = $con->query("INSERT INTO rooms(`name`, `qty`) VALUES ('$name', '$qty')");
   return $sql;
}

function selectDistinct($col, $table)
{
   global $con;
   $stmt1 = $con->prepare("SELECT DISTINCT $col FROM $table ORDER BY `price` ASC");
   $stmt1->execute();
   return $stmt1->get_result();
}

function selectDistinctWhere($col, $table, $cols, $param)
{
   global $con;
   $stmt1 = $con->prepare("SELECT DISTINCT $col FROM $table WHERE $cols='$param' ORDER BY `id` ASC");
   $stmt1->execute();
   return $stmt1->get_result();
}

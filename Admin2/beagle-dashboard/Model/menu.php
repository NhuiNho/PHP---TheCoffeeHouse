<?php
class menu
{
     function getMenuById($id)
     {
          $db = new connect();
          if ($id == 'all') {
               $select = "SELECT * FROM menu";
          } else {
               $select = "SELECT * FROM menu WHERE id = $id";
          }
          $result = $db->getList($select);
          return $result;
     }
}

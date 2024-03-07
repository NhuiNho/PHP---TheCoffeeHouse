<?php
class topping
{
     function getToppingById($id)
     {
          if ($id == 'all') {
               $select = "SELECT * FROM topping";
          } else {
               $select = "SELECT * FROM topping where id = $id";
          }
          $db = new connect();
          $result = $db->getList($select);
          return $result;
     }
}

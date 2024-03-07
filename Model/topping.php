<?php
class topping
{
     function getTopping($id)
     {
          $db = new connect();
          $select = "SELECT id, name, price FROM topping WHERE id = " . $id . "";
          $result = $db->getList($select);
          return $result;
     }
}

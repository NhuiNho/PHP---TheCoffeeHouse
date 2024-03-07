<?php
class size
{
     function getSize($id)
     {
          $db = new connect();
          $select = "SELECT id, name, description_name, price FROM size WHERE id = " . $id . "";
          $result = $db->getList($select);
          return $result;
     }
}

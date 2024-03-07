<?php
class size
{
     function getSizeById($id)
     {
          if ($id == 'all') {
               $select = "SELECT * FROM size";
          } else {
               $select = "SELECT * FROM size where id = $id";
          }
          $db = new connect();
          $result = $db->getList($select);
          return $result;
     }

     function getSizeByName($name)
     {
          $db = new connect();
          $select = "SELECT * FROM size where description_name = '$name'";
          $result = $db->getList($select);
          return $result;
     }
}

<?php
class category
{
     function getAllCategory()
     {
          $db = new connect();
          $select = "SELECT type FROM category";
          $result = $db->getList($select);
          return $result;
     }

     function getCategory($type1, $type2)
     {
          $db = new connect();
          if ($type2 == null) {
               $select = "SELECT id, type FROM category where category_type = " . $type1 . "";
          } else {
               $select = "SELECT id, type FROM category where category_type = " . $type1 . " and id = " . $type2 . "";
          }

          $result = $db->getList($select);
          return $result;
     }
}

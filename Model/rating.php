<?php
class rating
{
     function getRating($id)
     {
          $db = new connect();
          $select = "SELECT * from rating where product_id = $id";
          $result = $db->getList($select);
          return $result;
     }
}

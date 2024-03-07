<?php
class chuyennha
{
     function getChuyenNha()
     {
          $db = new connect();
          $select = "SELECT name FROM `chuyennha`";
          $result = $db->getList($select);
          return $result;
     }
}

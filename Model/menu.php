<?php
class menu
{
     function getAllMenu()
     {
          $db = new connect();
          $select = "SELECT id, name FROM menu";
          $result = $db->getList($select);
          return $result;
     }

     function getMenu($type)
     {
          $db = new connect();
          $select = "SELECT id, name FROM menu where id = " . $type . "";
          $result = $db->getList($select);
          return $result;
     }
}

<?php
class order
{
     function getOrders($status)
     {
          $db = new connect();
          if ($status == 100) {
               $select = "SELECT * FROM orders";
          } else {
               $select = "SELECT * FROM orders where status == $status";
          }
          $result = $db->getList($select);
          return $result;
     }
}

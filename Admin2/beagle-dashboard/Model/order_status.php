<?php
class order_status
{
     function getStatus($status)
     {
          if ($status == 'all') {
               $select = "SELECT * FROM order_status";
          } else {
               $select = "SELECT * FROM order_status where id = $status";
          }
          $db = new connect();
          $result = $db->getList($select);
          return $result;
     }
}

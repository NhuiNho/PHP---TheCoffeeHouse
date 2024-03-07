<?php
class order_detail
{
     function getOrderDetailById($id)
     {
          if ($id == 'all') {
               $select = "SELECT * FROM order_detail";
          } else {
               $select = "SELECT * FROM order_detail where order_id = $id";
          }
          $db = new connect();
          $result = $db->getList($select);
          return $result;
     }
}

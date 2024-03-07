<?php
class order_status
{
     public function getOrderStatusById($id)
     {
          $db = new connect();
          $select = ($id == 'all') ? "SELECT * FROM order_status" : "SELECT * FROM order_status where id = $id";
          $result = $db->getList($select);
          return $result;
     }
}

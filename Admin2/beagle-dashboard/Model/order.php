<?php
class order
{
     function getOrdersByStatus($status)
     {
          if ($status == 'all') {
               $select = "SELECT * FROM orders";
          } else {
               $select = "SELECT * FROM orders where status = $status";
          }
          $db = new connect();
          $result = $db->getList($select);
          return $result;
     }
     function getOrdersById($id)
     {
          if ($id == 'all') {
               $select = "SELECT * FROM orders";
          } else {
               $select = "SELECT * FROM orders where id = $id";
          }
          $db = new connect();
          $result = $db->getList($select);
          return $result;
     }
     function updateOrderStatus($id, $status)
     {
          $db = new connect();
          $query = "UPDATE orders SET status = $status WHERE id = $id";
          $result = $db->exec($query);
          return $result;
     }
}

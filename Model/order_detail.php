<?php
class order_detail
{
     function insertOrderDetail($order_id, $product_id, $size_id, $topping_id, $quantity)
     {
          $db = new connect();
          $query = "INSERT INTO order_detail (order_id, product_id, size_id, topping_id, quantity) VALUES (:order_id, :product_id, :size_id, :topping_id, :quantity)";
          $stmt = $db->execP($query);
          $stmt->bindParam(':order_id', $order_id);
          $stmt->bindParam(':product_id', $product_id);
          $stmt->bindParam(':size_id', $size_id);
          $stmt->bindParam(':topping_id', $topping_id);
          $stmt->bindParam(':quantity', $quantity);
          $result = $stmt->execute();
          return $result;
     }
     function getOrderDetail($order_id)
     {
          $db = new connect();
          $select = "SELECT * FROM order_detail WHERE order_id = $order_id";
          $result = $db->getList($select);
          return $result;
     }
}

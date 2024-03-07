<?php
class cart
{
     function insertCart($product_id, $user_id, $size_id, $topping_id, $quantity)
     {
          $db = new connect();
          $query = "INSERT INTO cart (id, product_id, user_id, size_id, topping_id, quantity) VALUES (null, :product_id, :user_id, :size_id, :topping_id, :quantity)";
          $stmt = $db->execP($query);
          $stmt->bindParam(':product_id', $product_id);
          $stmt->bindParam(':user_id', $user_id);
          $stmt->bindParam(':size_id', $size_id);
          $stmt->bindParam(':topping_id', $topping_id);
          $stmt->bindParam(':quantity', $quantity);
          $result = $stmt->execute();
          return $result;
     }

     // function insertCart($product_id, $user_id, $size_id, $topping_id, $quantity)
     // {
     //      $db = new connect();
     //      $query = "insert into cart (id, product_id, user_id, size_id, topping_id, quantity) values(null, $product_id, $user_id, $size_id, $topping_id, $quantity)";
     //      $result = $db->exec($query);
     //      return $result;
     // }
     function checkProductCart($product, $user, $size, $topping)
     {
          $db = new connect();
          $select = "SELECT * from cart where product_id = $product and user_id = $user and size_id = $size and topping_id = '$topping'";
          $result = $db->getList($select);
          return $result;
     }
     function updateProductCartByQuantity($id, $quantity)
     {
          $db = new connect();
          $query = "UPDATE cart SET quantity = $quantity WHERE id = $id";
          $result = $db->exec($query);
          return $result;
     }
     function getCartById($id)
     {
          $db = new connect();
          $select = "SELECT * from cart where user_id = $id";
          $result = $db->getList($select);
          return $result;
     }
     function getCart($id)
     {
          $db = new connect();
          $select = "SELECT * from cart where id = $id";
          $result = $db->getList($select);
          return $result;
     }
     function getProduct($id)
     {
          $db = new connect();
          $select = "SELECT * FROM product WHERE id = " . $id . "";
          $result = $db->getList($select);
          return $result;
     }
     function getSize($id)
     {
          $db = new connect();
          $select = "SELECT id, name, description_name, price FROM size WHERE id = " . $id . "";
          $result = $db->getList($select);
          return $result;
     }
     function getTopping($id)
     {
          $db = new connect();
          $select = "SELECT id, name, price FROM topping WHERE id = " . $id . "";
          $result = $db->getList($select);
          return $result;
     }
     function getVoucher($code)
     {
          $db = new connect();
          $select = "SELECT * FROM voucher WHERE code = '$code'";
          $result = $db->getList($select);
          return $result;
     }
     function removeProductForCart($id)
     {
          $db = new connect();
          $query = "DELETE FROM cart WHERE id = :id";
          $statement = $db->execP($query);
          $statement->bindParam(':id', $id);
          $result = $statement->execute();
          return $result;
     }
     function removeAllProductForCart($id)
     {
          $db = new connect();
          $query = "DELETE FROM cart where user_id = $id";
          $result = $db->exec($query);
          return $result;
     }
}

<?php
class comment
{
     function getComment($product_id)
     {
          $db = new connect();
          $select = "select * from comment where product_id = $product_id";
          $result = $db->getList($select);
          return $result;
     }

     function insertComment($product_id, $comment, $user_id)
     {
          $db = new connect();
          $query = "INSERT INTO comment (user_id, product_id, description) VALUES (:user_id, :product_id, :comment)";
          $stmt = $db->execP($query);
          $stmt->bindParam(':user_id', $user_id);
          $stmt->bindParam(':product_id', $product_id);
          $stmt->bindParam(':comment', $comment);
          $result = $stmt->execute();
          return $result;
     }
}

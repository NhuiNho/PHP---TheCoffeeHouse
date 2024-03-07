<?php
class product
{
     function getProductLove()
     {
          $db = new connect();
          $topic1 = "Cà Phê HighLight";
          $topic2 = "Hi-Tea Trà";
          $topic3 = "Bánh Mặn";
          $select = "(SELECT a.id, a.name, a.price, a.image, a.description
          FROM product a 
          JOIN category b ON a.product_type = b.id 
          WHERE b.type = '" . $topic1 . "' 
          LIMIT 2)
          UNION
          (SELECT a.id, a.name, a.price, a.image, a.description 
          FROM product a 
          JOIN category b ON a.product_type = b.id 
          WHERE b.type = '" . $topic2 . "' 
          LIMIT 2)
          UNION
          (SELECT a.id, a.name, a.price, a.image, a.description 
          FROM product a 
          JOIN category b ON a.product_type = b.id 
          WHERE b.type = '" . $topic3 . "' 
          LIMIT 2)";
          $result = $db->getList($select);
          return $result;
     }

     function getProduct($product)
     {
          $db = new connect();
          $select = "SELECT id, name, price, image, product_type FROM product WHERE product_type = " . $product . "";
          $result = $db->getList($select);
          return $result;
     }
     function getProductByCategory($category)
     {
          $db = new connect();
          $select = "SELECT a.id, a.name, a.price, a.description, a.image FROM product a WHERE a.product_type = $category";
          $result = $db->getList($select);
          return $result;
     }
     function getAllCategory()
     {
          $db = new connect();
          $select = "SELECT id, type, image FROM category";
          $result = $db->getList($select);
          return $result;
     }

     function getProductById($product)
     {
          $db = new connect();
          $select = "SELECT * FROM product WHERE id = $product";
          $result = $db->getList($select);
          return $result;
     }
}

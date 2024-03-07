<?php
class product
{
     function getProductById($id)
     {
          $db = new connect();
          if ($id == 'all') {
               $select = "SELECT * FROM product";
          } else {
               $select = "SELECT * FROM product where id = $id";
          }
          $result = $db->getList($select);
          return $result;
     }
     function getProductPage($start, $countItem)
     {
          $db = new connect();
          $select = "SELECT * FROM product LIMIT $start, $countItem";
          $result = $db->getList($select);
          return $result;
     }
     function updateImageProduct($id, $image)
     {
          $db = new connect();
          $query = "UPDATE product SET image = '$image' WHERE id = $id";
          $result = $db->exec($query);
          return $result;
     }
     function updateProduct($id, $name, $price, $sale, $description, $product_type)
     {
          $db = new connect();
          if (empty($sale)) {
               $sale = 'null';
          }
          $query = "UPDATE product SET name = '$name', price = $price, sale = $sale, description = '$description', product_type = $product_type  WHERE id = $id";
          $result = $db->exec($query);
          return $result;
     }
     function removeProduct($id)
     {
          $db = new connect();
          $query = "DELETE FROM product WHERE id = $id";
          $result = $db->exec($query);
          return $result;
     }
     function insertProduct($name, $price, $product_type, $image, $description, $sale)
     {
          $db = new connect();
          if (empty($sale)) {
               $sale = 'null';
          }
          $query = "INSERT INTO product (id, name, price, product_type, image, description, sale) VALUES (null, '$name', $price, $product_type, '$image', '$description', $sale)";
          $result = $db->exec($query);
          if ($result) {
               $lastInsertedId = $db->lastInsertId();
               return $lastInsertedId;
          } else {
               return false;
          }
     }
     function getProductSearch1($search, $type, $price_1, $price_2)
     {
          $db = new connect();
          $select = "SELECT count(*) FROM product where name like '%$search%' and product_type like '%$type%' and (price between $price_1 and $price_2)";
          $result = $db->getList($select);
          return $result;
     }
     function getProductSearch2($search, $type, $price_1, $price_2, $indexStart, $itemPage)
     {
          $db = new connect();
          $select = "SELECT * FROM product where name like '%$search%' and product_type like '%$type%' and (price between $price_1 and $price_2) limit $indexStart, $itemPage";
          $result = $db->getList($select);
          return $result;
     }
}

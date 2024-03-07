<?php
class product_detail
{
     function getProductDetail_size($id)
     {
          $db = new connect();
          $select = "SELECT distinct size FROM product_detail WHERE product = " . $id . "";
          $result = $db->getList($select);
          return $result;
     }

     function getProductDetail_topping($id)
     {
          $db = new connect();
          $select = "SELECT distinct topping FROM product_detail WHERE product = " . $id . "";
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

     function getCategory($id)
     {
          $db = new connect();
          $select = "SELECT id, type FROM category WHERE id = " . $id . "";
          $result = $db->getList($select);
          return $result;
     }
}

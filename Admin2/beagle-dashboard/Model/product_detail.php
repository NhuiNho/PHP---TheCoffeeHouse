<?php
class product_detail
{
     function add($product, $size, $topping)
     {
          $db = new connect();
          $query = "INSERT INTO product_detail (product, size, topping) VALUES ($product, $size, $topping)";
          $result = $db->exec($query);
          return $result;
     }
}

<?php
class payment_method
{
     function getPaymentMethod($id)
     {
          if ($id == 'all') {
               $select = "SELECT * FROM payment_method";
          } else {
               $select = "SELECT * FROM payment_method where id = $id";
          }
          $db = new connect();
          $result = $db->getList($select);
          return $result;
     }
}

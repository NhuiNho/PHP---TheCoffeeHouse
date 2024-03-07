<?php
class payment_method
{
     function getPaymentMethodById($id)
     {
          $db = new connect();
          $select = ($id == 'all') ? "SELECT * FROM payment_method" : "SELECT * FROM payment_method where id = $id";
          $result = $db->getList($select);
          return $result;
     }
}

<?php
class voucher
{
     function getVoucherById($id)
     {
          if ($id == 'all') {
               $select = "SELECT * FROM voucher";
          } else {
               $select = "SELECT * FROM voucher where id = $id";
          }
          $db = new connect();
          $result = $db->getList($select);
          return $result;
     }
}

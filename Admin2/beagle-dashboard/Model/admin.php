<?php
class admin
{
     function checkAdmin($email, $password)
     {
          $db = new connect();
          $select = "SELECT * from admin where email = '$email' and password = '$password'";
          $result = $db->getList($select);
          return $result;
     }
}

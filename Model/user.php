<?php
class user
{
     function getCheckUser($email, $phone)
     {
          $db = new connect();
          $select = "SELECT * from user where email = '$email' or phone = '$phone'";
          $result = $db->getList($select);
          return $result;
     }
     function insertUser($fullname, $phone, $address, $password, $email)
     {
          $db = new connect();
          $query = "insert into user (id, fullname, phone, address, password, email) values (null, '$fullname', '$phone', '$address', '$password', '$email')";
          $result = $db->exec($query);
          return $result;
     }
     function getLoginUser($phoneemail, $password)
     {
          $db = new connect();
          $select = "SELECT * from user where (phone = '$phoneemail' or email = '$phoneemail') and password = '$password'";
          $result = $db->getList($select);
          return $result;
     }
     function getUsers($id)
     {
          $db = new connect();
          $select = "SELECT * from user where id = $id";
          $result = $db->getInstance($select);
          return $result;
     }
     function updateImageUser($id, $image)
     {
          $db = new connect();
          $query = "UPDATE user SET avatar = '$image' WHERE id = $id";
          $result = $db->exec($query);
          return $result;
     }
     function updateProfile($id, $fullname, $phone, $address, $password, $email)
     {
          $db = new connect();
          $query = "UPDATE user set fullname = '$fullname', phone = '$phone', address = '$address', password = '$password', email = '$email' WHERE id = $id";
          $result = $db->exec($query);
          return $result;
     }

     function updatePassword($email, $password)
     {
          $db = new connect();
          $query = "UPDATE user set password = '$password' WHERE email = '$email'";
          $result = $db->exec($query);
          return $result;
     }
}

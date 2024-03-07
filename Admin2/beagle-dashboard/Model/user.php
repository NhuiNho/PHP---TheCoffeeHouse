<?php
class user
{
     function getCheckUser($username, $email, $phone)
     {
          $db = new connect();
          $select = "SELECT * from user where username = '$username' or email = '$email' or phone = '$phone'";
          $result = $db->getList($select);
          return $result;
     }
     function insertUser($fullname, $phone, $address, $username, $password, $email)
     {
          $db = new connect();
          $query = "insert into user (id, fullname, phone, address, username, password, email) values(null, '$fullname', '$phone', '$address', '$username', '$password', '$email')";
          $result = $db->exec($query);
          return $result;
     }
     function getLoginUser($useremail, $password)
     {
          $db = new connect();
          $select = "SELECT * from user where (username = '$useremail' or email = '$useremail') and password = '$password'";
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
     function updateProfile($id, $fullname, $phone, $address, $username, $password, $email)
     {
          $db = new connect();
          $query = "UPDATE user set fullname = '$fullname', phone = '$phone', address = '$address', username = '$username', password = '$password', email = '$email' WHERE id = $id";
          $result = $db->exec($query);
          return $result;
     }
     function getAllUsers()
     {
          $db = new connect();
          $select = "SELECT * from user";
          $result = $db->getList($select);
          return $result;
     }
}

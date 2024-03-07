<?php
class order
{
     function getAllPaymentMethod()
     {
          $db = new connect();
          $select = "SELECT * FROM payment_method";
          $result = $db->getList($select);
          return $result;
     }

     function insertOrder($user_id, $name_receiver, $address_receiver, $phone_receiver, $email_receiver, $time, $total_price, $payment_method, $voucher_id)
     {
          $db = new connect();
          $query = "INSERT INTO orders (id, user_id, name_receiver, address_receiver, phone_receiver, email_receiver, time, total_price, payment_method, voucher_id) VALUES (null, :user_id, :name_receiver, :address_receiver, :phone_receiver, :email_receiver, :time, :total_price, :payment_method, :voucher_id)";
          $stmt = $db->execP($query);
          $stmt->bindParam(':user_id', $user_id);
          $stmt->bindParam(':name_receiver', $name_receiver);
          $stmt->bindParam(':address_receiver', $address_receiver);
          $stmt->bindParam(':phone_receiver', $phone_receiver);
          $stmt->bindParam(':email_receiver', $email_receiver);
          $stmt->bindParam(':time', $time);
          $stmt->bindParam(':total_price', $total_price);
          $stmt->bindParam(':payment_method', $payment_method);
          $stmt->bindParam(':voucher_id', $voucher_id);
          $result = $stmt->execute();
          if ($result) {
               $lastInsertedId = $db->lastInsertId();
               return $lastInsertedId;
          } else {
               return false;
          }
     }

     function getOrderById($id, $user_id)
     {
          $db = new connect();
          $select = ($id == 'all') ? "SELECT * FROM orders where user_id = $user_id" : "SELECT * FROM orders WHERE id = $id";
          $result = $db->getList($select);
          return $result;
     }
     function cancelOrder($id)
     {
          $db = new connect();
          $query = "UPDATE orders SET status = 4 WHERE id = $id";
          $result = $db->exec($query);
          return $result;
     }

     function getOrderByEmail($id, $email)
     {
          $db = new connect();
          $select = ($id == 'all') ? "SELECT * FROM orders where email_receiver = '$email'" : "SELECT * FROM orders WHERE email_receiver = '$email' and id = $id";
          $result = $db->getList($select);
          return $result;
     }
}

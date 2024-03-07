<?php
$comment = new comment();
if (isset($_POST['submit'])) {
     $user_id = $_SESSION['id'];
     $product_id = $_POST['product_id'];
     $description = $_POST['comment'];
     $insert = $comment->insertComment($product_id, $description, $user_id);
     echo "<script> window.location.href='?action=product&act=product_detail&id=$product_id' </script>";
}

<?php
$act = "home";
if (isset($_GET['act'])) {
     $act = $_GET['act'];
}
switch ($act) {
     case 'home':
          include_once "View/home.php";
          break;
}

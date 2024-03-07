<?php
if (isset($_SESSION['id_admin'])) {
     include_once "View/home.php";
} else {
     include_once "View/login.php";
}

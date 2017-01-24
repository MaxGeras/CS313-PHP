<?php
session_start();
session_destroy();
//unset($_SESSION["login_user"]);
header('location: user.php');
?>
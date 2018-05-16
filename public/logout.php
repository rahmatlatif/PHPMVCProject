<?php
session_start();
session_destroy();
header("Location:/module5project/public/login.php");
?>
<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
    require_once 'autoload.php';
    global $user;
    $user = unserialize($_SESSION['user']);
} else {
    $user = false;
    header("Location:/module5project/public/login.php");
}
?>
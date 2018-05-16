<?php
spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . "/module5project/" .$class_name . '.php';
});
?>

<?php
    require 'init.php';
    unset($_SESSION['user']); // session destroy
    go('login.php');
?>
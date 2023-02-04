<?php 
session_start();

// LOG OUT TO EVERYONE USER OR ADMIN
if(isset($_SESSION['login'])) {
    session_destroy();
    header('Location:login.php');
    exit();
} else {
    header('Location:index.php');
}

?>
<?php 
session_start();
// The PDO connection started
require 'meroconnection.php';

$loglog = false;


// IF THE USER IS LOGGED IN
if(isset($_SESSION['login'])) {
    $loglog = true;
} else {
    header('Location:index.php');
    exit;
      
}

// IF THE ADMIN LOGGED IN
if($_SESSION['isAdmin'] == false) {
    header('Location:index.php');
    exit;
}

// IF ADMIN DID NOT ACCESS THAN
if(isset($_GET['id']) == false) {
    header('Location:index.php');
    exit;
}

// DELETE THE CATEGORY FROM THE DATABASE 
$CAT = $conn->prepare('delete from category where id=?');
$CAT->execute([$_GET['id']]);

header('Location:adminCategories.php');


?>
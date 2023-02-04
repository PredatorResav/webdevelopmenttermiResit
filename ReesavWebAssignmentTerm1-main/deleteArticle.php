<?php 
session_start();
// IT HAS THE PDO CONNECTION THAT ARE NECESSARY
require 'meroconnection.php';

$loglog = false;
// IT CHECKS IF THE USER LOGGED IN  OR NOT
if(isset($_SESSION['login'])) {
    $loglog = true;
} else {
    header('Location:index.php'); 
    // DIRECTLY GOES TO THE REQUIRE PAGE
    exit;
      
}

// IT CHECKS IF THE ADMIN IS LOGGED IN  OR NOT
if($_SESSION['isAdmin'] == false) {
    header('Location:index.php');
    exit;
}

//GETS INTO A NEW PAGE IF NO ID EXIST
if(isset($_GET['id']) == false) {
    header('Location:index.php');
    exit;
}


// IF IT EXIST THAN DELETE AND GOES TO NEXT PAGE
$meroarti = $conn->prepare('delete from article where id=?');
$meroarti->execute([$_GET['id']]);

header('Location:adminArticles.php');


?>
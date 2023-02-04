<?php 
    // provides the connectioin link to the database in order to access the tables and db
    $conn = new PDO("mysql:dbname=webAssignment;host=db", 'root','halted',[PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION])

?>
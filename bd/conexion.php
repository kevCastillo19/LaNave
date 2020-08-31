<?php

try {

    $con = new PDO("mysql:host=localhost;dbname=lanave","root","");

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Error: ". $e->getMessage());
    
}

?>
<?php
$db = 'mysql:host=localhost;dbname=ajax';
$user = 'root';
$pass = 'root';

try{
    $pdo = new PDO($db,$user,$pass);
   
}
catch(PDOException $erreur)
{
    echo  "Erreur : accès refusé à la db";
    die();
}
?>
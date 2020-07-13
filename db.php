<?php
$pdo;
try{
    $pdo = new PDO('mysql:dbname=finelia;host=localhost:3307;','root', '');
} catch (Exception $e) {
    die ('Erreur SQL : '.$e->getMessage());
}


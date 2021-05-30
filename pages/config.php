<?php

// Errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

try
{
    $pdo = new PDO('mysql:host=mysql-floatvictor.alwaysdata.net;dbname=floatvictor_cookguide;port=3306','237147','utilisateur1');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e)
{
    echo 'Problème de connection';
    die();
}

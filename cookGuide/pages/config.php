<?php

// Errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

try
{
    $pdo = new PDO('mysql:host=localhost;dbname=cookguide;port=8889','root','root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e)
{
    echo 'Problème de connection';
    die();
}

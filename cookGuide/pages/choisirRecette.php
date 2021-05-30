<?php

require('config.php');

$stmt = $pdo->query("SELECT * FROM recette");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<pre>';
    //print_r($row);
    echo '</pre>';
    echo '<a href="recette.php?id='.$row['Id'].'">'.$row['Nom'].'</a>';
}

echo '<pre>';
echo '<a href="../index.php">Home</a>';
echo '</pre>';
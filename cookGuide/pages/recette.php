<?php

require('config.php');

// echo '<pre>';
// print_r($_GET["id"]);
// echo '</pre>';

$recette = $pdo->query("SELECT * FROM recette WHERE Id = ".$_GET["id"])->fetch();

echo '<h2>'.$recette->Nom.'</h2>';
echo '<p>Temps : '.$recette->Durée.'</p>';
echo '<p>Prix : '.$recette->Prix.'€</p>';

$recetteQuery = $pdo->query("SELECT * FROM recetteingredients WHERE fk_IdRecette = ".$recette->Id);

echo '<h4>Ingrédients :</h4>';
echo '</pre>';
while ($row = $recetteQuery->fetch()) {
    $ingredient = $pdo->query("SELECT * FROM ingredient WHERE Id = ".$row->fk_IdIngredient)->fetch();
    echo '<p>'.$ingredient->Nom.' : '.$row->quantitée.' g</p>';
}

echo '<a href="./choisirRecette.php">Revenir à la liste des recettes</a>';
echo '</br>';
echo '<a href="../index.php">Home</a>';
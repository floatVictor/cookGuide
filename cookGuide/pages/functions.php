<?php
require_once('connect.php');
function compareIngredients($nomIngredient,$bdd)
{
    $reponse = $bdd->query('SELECT Id FROM ingredient WHERE ingredient==$nomIngredient');
    if($reponse) echo($nomIngredient,"est dans la table");
    else echo($nomIngredient,"n'est pas dans la table");
}

function addIngredient($nomIngredient, $bdd)
{
    $reponse = $bdd->query('SELECT MAX(Id) FROM ingredient');
    $sql = INSERT INTO ingredient (Id, Nom) VALUES ('$reponse+1', '$nomIngredient');
}

function addIngredientToRecette($nomIngredient,$quant,$idRecette,$bdd)
{
    
    if(!$bdd->query(SELECT * FROM recetteingredients WHERE fk_IdIngredient==$nomIngredient AND fk_IdRecette==$idRecette)){
        $reponse = $bdd->query(SELECT Id FROM ingredient WHERE Nom==$nomIngredient);
        $sql = INSERT INTO recetteingredients (fk_IdRecette, fk_IdIngrédient,quantité)
                VALUES ('$idRecette', '$response','$quant');
    }

}

function compareRecette($nomRecette,$bdd){
    $reponse = $bdd->query('SELECT Id FROM recette WHERE Nom==$nomIngredient');
    if($reponse) echo($nomIngredient,"est dans la table");
    else echo($nomIngredient,"n'est pas dans la table");   
}

function addRecette($nomRecette,$Duree,$fk_user,$fk_idCategorie,$Prix,$array,$bdd){
    $reponse = $bdd->query(SELECT MAX(Id) FROM recette);
    $sql = INSERT INTO recette (Id, Nom,Durée,fk_user,fk_idCategorie,Prix) VALUES ('$reponse+1', '$nomRecette','$Duree','$fk_user','$fk_idCategorie','$Prix');
    foreach($array as $value);
    addIngredientToRecette($value,$nomRecette,$bdd);
    
}
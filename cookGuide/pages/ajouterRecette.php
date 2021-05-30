<?php
require('config.php');

$nom = $_POST['nom'];
$durée = $_POST['durée'];
$prix = $_POST['prix'];
$user = $_POST['user'];
$categorie = $_POST['catégorie'];
$ingTab = $_POST['ingredient'];
$quantiteeTab = $_POST['quantitee'];

$stmt = $pdo->query("SELECT * FROM user");

// Test if user exist
$userExist = false;
$useId = null;
while ($row = $stmt->fetch()) {
	if ($row->Pseudo === $user) {
		$userExist = true;
		$userId = $row->Id;
	}
}

// Insert user if he is new
if (!$userExist) {
	$sql = "INSERT INTO `user` (`Pseudo`) VALUES (?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$user]);

	$userId = $pdo->lastInsertId();
}

// Insert recette
$sql = "INSERT INTO recette ( `nom`, `durée`, `prix`, `fk_IdUser`, `fk_IdCategorie`) VALUES (?,?,?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$nom, $durée, $prix, $userId, $categorie ]);

$recetteId = $pdo->lastInsertId();


// Test ingredients
for ($i=0; $i < count($ingTab); $i++) {
	$stmt = $pdo->query('SELECT * FROM ingredient');

	// Test if ing exist
	$ingExist = false;
	$ingId = null;
	while ($row = $stmt->fetch()) {
		if ($row->Nom === $ingTab[$i]) {
			$ingExist = true;
			$ingId = $row->Id;
		}
	}

	// Insert ing if it is new
	if (!$ingExist) {
		$sql = "INSERT INTO ingredient (`Nom`) VALUES (?)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$ingTab[$i]]);

		$ingId = $pdo->lastInsertId();
	}

	$sql = "INSERT INTO recetteingredients (`fk_IdRecette`, `fk_IdIngredient`, `quantitée`) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$recetteId, $ingId, $quantiteeTab[$i]]);
}

echo '<pre/>';
echo 'Recette ajouté !';
echo '<pre/>';
echo '<a href="../index.php">Home</a>';

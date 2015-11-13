<?php
// include models, including the database connection
require_once("models/DB.php");
require_once("models/Recipe.php");
require_once("models/Ingredient.php");
require_once("models/units_of_measure.php");
// get querystring data (part 2)
$recipe = Recipe::findAll($dbh);
$newRecipe;

if(isset($_GET['Details'])){
	$viewID = $_GET['Details'];
	require_once("ShowRecipe.php");
	$newRecipe = 0;
	die();
}
else if(isset($_GET['order'])){
	$recipe = Recipe::sortBy($dbh,$_GET['order']);
}
else if(isset($_GET['addRecipe'])){
	//$ing = Ingredient::sortIngredientASC($dbh);
	//$units = units_of_measure::sortUnitsASC($dbh);
	$ing = Ingredient::findAll($dbh);
	$units = units_of_measure::findAll($dbh);
	$newRecipe = 1;
	require_once("EditRecipe.php");
		die();
}

if($_POST){
	if(array_key_exists('terms',$_POST)){
		$recipe = Recipe::findByKeyword($dbh,$_POST['terms']);
	}
}



require_once("views/view_recipes.php");

?>
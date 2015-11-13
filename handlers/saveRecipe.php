<?php 
require_once("../models/Recipe.php");
require_once("../models/units_of_measure.php");
require_once( '../models/DB.php' );
require_once( '../models/Ingredient.php' );
require_once( '../models/Step.php' );
require_once("../models/RecipeIngredientUnit.php");

$recipe = new Recipe();

print_r($_POST);

$recipe->name = $_POST['name'];
$recipe->description = $_POST['description'];
$recipe->img_url = $_POST['img_url'];
$recipe->prep_time = $_POST['prep_time'];
$recipe->total_time = $_POST['total_time'];
$recipe->save($dbh);
$recipeID = Recipe::getLastInsertId($dbh);



$stepsInsert = $_POST['step'];

$stepcounter = 1;
foreach ($stepsInsert as $text){
	$S = new Step();
	$S->recipe_id = $recipeID;
	$S->stepno = $stepcounter;
	$S->text = $text;
	$stepcounter += 1;
	$S->insertStep($dbh);
}

$amount = $_POST['amount'];
$unitid = $_POST['unitid'];
$ingredientid= $_POST['ingredientid'];
$length = count($ingredientid);


for($i = 0; $i < $length; $i++){
	if($amount[$i] != 0 ){
		$I = new RecipeIngredientUnit();
		$I->recipe_id = $recipeID;
		$I->ingredient_id = $ingredientid[$i];
		$I->unit_id = $unitid[$i];
		$I->amount = $amount[$i];
		$I->insert($dbh);
	}
}

require_once("../views/view_recipes.php");
?>
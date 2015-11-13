<?php
require_once("models/DB.php");
	require_once("models/Recipe.php");
	require_once("models/Ingredient.php");
	require_once("models/units_of_measure.php");
	require_once("models/RecipeIngredientUnit.php");
	require_once("models/IngredientLayout.php");
	require_once("models/Step.php");
// Route 1: user comes here to see a specific recipe
//   get the id of the recipe they want from the query string,
//   inflate a recipe model, and show them the detail view



	//make new recipy and find it based on the ID of the selected anchor
	$details = new Recipe();
	$details->find($viewID,$dbh);

	$steps = Step::findAllSteps($dbh,$details->id);
	$riu= RecipeIngredientUnit::findAllForRecipe( $details->id, $dbh );


	$ingredients = array();
	foreach($riu as $i){
		//$p = new IngredientLayout();
		//$p->amount = $i->amount;
		//$p->ingredient = Ingredient::findName($i->ingredient_id,$dbh);
		//$p->unit= units_of_measure::findName($i->unit_id,$dbh);
		//$ingredients[] = $p;
	}
	print_r($ingredients);

	

	


require_once("views/view_recipe.php");
?>
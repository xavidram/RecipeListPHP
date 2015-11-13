<html>

<head>
<title>My Recipes</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="main.css">
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

</head>

<body>

<div class="container">

<div class="page-header">
	<h1>Add/Edit Recipe</h1>
</div>

<form method="POST" action="../handlers/saveRecipe.php">

	<div class="form-group">
	    <label>Name:</label>
		<input type="text" name="name" class="form-control" value="<?php if($editRecipe == 1){echo $newEntry->name;} ?>">
	</div>

	<div class="form-group">
	    <label>Description:</label>
		<input type="text" name="description" class="form-control"value="<?php if($editRecipe == 1){echo $newEntry->description;} ?>">
	</div>

	<div class="form-group">
	    <label>Image URL:</label>
		<input type="text" name="img_url" class="form-control" value="<?php if($editRecipe == 1){echo $newEntry->img_url;}else{echo "http;//";} ?>">
	</div>

	<div class="form-group">
	    <label>Prep Time:</label>
		<input type="text" name="prep_time" class="form-control" maxlength="4" value="<?php if($editRecipe == 1){echo $newEntry->prep_time;} ?>">
	</div>

	<div class="form-group">
	    <label>Total Time:</label>
		<input type="text" name="total_time" class="form-control" maxlength="4" value="<?php if($editRecipe == 1){echo $newEntry->total_time;} ?>">
	</div>

	<h2>Ingredients</h2>
<?php if($editRecipe == 1){?>
	<div class="form-group">
		<input type="text" name="amount[]" class="form-control" maxlength="4">
		<select name="unitid[]" class="form-control">
		<?php foreach($units as $u){?>
			<option value="<?=$u->id;?>"><?=$u->name;?></option>
			<?php } ?>
		</select>
		<select name="ingredientid[]" class="form-control">
			<?php foreach($ing as $i){?>
			<option value="<?=$i->id;?>"><?=$i->name;?></option>
			<?php }?>
		</select>
	</div>
	<?php } else {?>
		<div id="Ingredient">
		<div class="form-group" >
			<input type="text" name="amount[]" class="form-control" maxlength="4">
			<select name="unitid[]" class="form-control">
			<?php foreach($units as $u){?>
				<option value="<?=$u->id;?>"><?=$u->name;?></option>
				<?php } ?>
			</select>
			<select name="ingredientid[]" class="form-control">
				<?php foreach($ing as $i){?>
				<option value="<?=$i->id;?>"><?=$i->name;?></option>
				<?php }?>
			</select>
		</div>
	</div>
	<?php }?>

	<!-- copy the form group and replicate it when user clicks the pluss button so they can enter more ingredients -->

	<!-- this is the template to add ingredients -->
	<div id="Ingredient" hidden>
		<div class="form-group" >
			<input type="text" name="amount[]" class="form-control" maxlength="4">
			<select name="unitid[]" class="form-control">
			<?php foreach($units as $u){?>
				<option value="<?=$u->id;?>"><?=$u->name;?></option>
				<?php } ?>
			</select>
			<select name="ingredientid[]" class="form-control">
				<?php foreach($ing as $i){?>
				<option value="<?=$i->id;?>"><?=$i->name;?></option>
				<?php }?>
			</select>
		</div>
	</div>
<!-- end of ingredient template -->
	<button type="button" id="addIngredient" class="btn">+</button>

	<h2>Steps</h2>

	<div class="form-group">
	<?php if($editRecipe == 1){
		foreach($steps as $s){?>
		<input type="text" name="step[]" class="form-control">
	<?php }}else{ ?>
		<input type="text" name="step[]" class="form-control">
		<input type="text" name="step[]" class="form-control">
		<input type="text" name="step[]" class="form-control">
	<?php } ?>
		<div id="Step" hidden>
			<input type="text" class="form-control">
		</div>
		<button type="button" id="addStep" class="btn">+</button>

	</div>

	<button type="submit"  class="btn btn-primary">Add/Save</button>

</form>

</div>
<script src="./views/recipes.js"></script>
</body>

</html>
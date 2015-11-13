<html>

<head>
<title>My Recipes</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="main.css">

</head>

<body>

<div class="container">

<div class="page-header">
	<h1><?=$details->name;?></h1>
</div>

<div class="row">
<div class="col-md-12">
	<a class="btn btn-primary" href="EditRecipe.php?edit=<?=$details->id?>" id="<?=$details->id?>">Edit</a>
</div>
</div>

<div class="row">
	<div class="col-md-10">
	<?=$details->description;?>
	</div>

	<div class="col-md-2">
	<img class="thumb" src="<?=$details->img_url;?>">
	</div>
</div>

<p><label>Prep Time:</label> <?=$details->prep_time;?> min.</p>
<p><label>Total Time:</label> <?=$details->total_time;?>min.</p>

<h3>Ingredients</h3>

<ul>
<?php foreach ($riu as $I){ ?>
	<li><?=$I->amount . " " . units_of_measure::findName($I->unit_id,$dbh) ." " .Ingredient::findName($I->ingredient_id,$dbh);?></li>
<?php } ?>
</ul>

<h3>Steps</h3>

<ul>
<?php foreach ($steps as $s){?>
	<li><?=$s->text;?></li>
<?php }?>
</ul>

</div>

<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="views/recipes.js"></script>

</body>

</html>
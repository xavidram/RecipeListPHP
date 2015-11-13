<html>

<head>
<title>My Recipes</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="main.css">

</head>

<body>

<div class="container">

<div class="page-header">
	<h1>The Bestest Recipes</h1>
</div>

<form method="POST" action="">

<div class="input-group">
	<input type="text" name="terms" id="search" class="form-control">
	<span class="input-group-btn"><button class="btn btn-primary">Search</button></span>
</div>

<table class="table">

<tr>
	<th></th>
	<th><a href="RecipeList.php?order=name">Name</a></th>
	<th><a href="RecipeList.php?order=prep_time">Prep Time</a></th>
	<th><a href="RecipeList.php?order=total_time">Total Time</a></th>
	<th><a href="RecipeList.php?order=rating">Rating</a></th>
</tr>

<?php foreach($recipe as $r){ ?>
<tr>
	<td rowspan="2">
		<img class="thumb" src="<?=$r->img_url;?>">
	</td>
	<td><a href="RecipeList.php?Details=<?=$r->id;?>"><?=$r->name;?></a></td>
	<td><?=$r->prep_time;?></td>
	<td><?=$r->total_time;?></td>
	<td><?=$r->rating;?></td>
</tr>
<tr><td colspan="4"><?=$r->description?></td></tr>

<?php } ?>



</table>

</div>

<div class="col-md-2 col-md-offset-5">
	<a href="RecipeList.php?addRecipe" class="btn btn-primary">New Recipe</a>
</div>

</body>

</html>
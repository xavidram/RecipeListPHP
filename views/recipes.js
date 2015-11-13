/*
$("#toggle_edit").click(function() {
	
	//$.post("./EditRecipe.php", {NAME: $('.page-header').find('h1').text()},console.log("success"));
	//location.href = "EditRecipe.php?edit=".$('.page-header').find('h1').text();

	var ajaxurl = 'https://EditRecipe.php',
	data = {'edit': $('.page-header').find('h1').text()};
	$.post(ajaxurl,data,function (response){
		console.log("success");
	})
})
*/

$("#addIngredient").click(function(){

	$('#Ingredient').find('.form-group').clone().insertBefore('#Ingredient').show();
	return false;
})

$("#addStep").click(function(){

	$('#Step').find('.form-control').clone().attr('name','step[]').insertBefore('#Step').show();
	return false;
})
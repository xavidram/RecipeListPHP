<?php
require_once( '../models/DB.php' );
require_once( '../models/Ingredient.php' );

$ing = new Ingredient();
$ing->name = $_POST['name'];
$ing->save($dbh);

header( "Content-type: text/json" );
echo json_encode( $ing );
?>
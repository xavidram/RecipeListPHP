<?php
class Ingredient
{
	public static $tableName = "ingredients";
	
	public $id;
	public $name;

	public $errors = [];
	
	function copyFromRow( $row ) 
	{

		$this->id = $row['id'];
		$this->name = $row['name'];
	}
	
	static function findAll( $dbh ) {
		$stmt = $dbh->prepare( "select * from ".Ingredient::$tableName );
		$stmt->execute();
		$result = array();
		while( $row = $stmt->fetch() ) {
			$p = new Ingredient();
			$p->copyFromRow( $row );
			$result[] = $p;
		}
		return $result;
	}

		function findName($id,$dbh){
			$stmt = $dbh->prepare("select * from ". Ingredient::$tableName." where id = :id;");
			$stmt->bindParam(":id",$id);
			$stmt->execute();
			$row = $stmt->fetch();
			$p = new Ingredient();
			$p->copyFromRow($row);
			return $p->name;
		}

	static function findAllIngredients( $dbh,$recipeID ) {
		$stmt = $dbh->prepare( "select * from ".Ingredient::$tableName );
		$stmt->execute();
		$result = array();
		while( $row = $stmt->fetch() ) {
			$p = new Ingredient();
			$p->copyFromRow( $row );
			if($p->id == $recipeID){
				
				$result[] = $p;
			}else{
				unset($p);
			}
		}
		return $result;
	}

	function removeIngredient($id,$dbh){
			$stmt = $dbh->prepare("DELETE FROM ".Ingredient::$tableName ." WHERE `id' = :id");
			$stmt->bindParam(":id",$id);
			$stmt->execute();
		}

		function updateIngredient($dbh){
			$stmt = $dbh->prepare("UPDATE ".Ingredient::$tableName ." SET `id`=?,`name=? WHERE `id` = :id");
			$stmt->bindParam(":id",$this->id);
			$stmt->bindParam(1,$this->id);
			$stmt->bindParam(4,$this->name);
			$stmt->execute();

		}

	function validate($dbh) {
		$this->errors = [];

		// check for blank name
		if ($this->name == "") {
			$this->errors[] = "Ingredient name cannot be blank";
		}

		// check for unique name (hint: use find method)

		return (count($this->errors) == 0);
	}

	function getErrors() {
		if (count($this->errors) > 0 ) {
			return implode($this->errors, "<br/>");
		}
		return "";
	}
static function findByName( $dbh, $termstr ) {
		$terms = explode(" ", $termstr);

		$sql = "select * from ".Ingredient::$tableName." where ";
		for( $i=0;$i<count($terms);$i++ ) {
			if( $i > 0 ) {
				$sql .= " or ";
			}
			$sql .= "name like :term$i ";
		}

		$stmt = $dbh->prepare( $sql );
		for( $i=0;$i<count($terms);$i++ ) {
			$terms[$i] = "%".$terms[$i]."%";
			$stmt->bindParam(":term$i", $terms[$i]);
		}
		$stmt->execute();

		$result = array();
		while( $row = $stmt->fetch() ) {
			$in = new Ingredient();
			$in->copyFromRow($row);
			$result[] = $in;
		}
		return $result;
	}

	function save( $dbh ) {
		if( $this->id == null ) {
			print "new ingredient";
			$stmt = $dbh->prepare( "insert into ".
									Ingredient::$tableName.
									" (name) VALUES(:name)" );
			$stmt->bindParam(":name", $this->name);
			$stmt->execute();

			// get auto incremented id
			$this->id = $dbh->lastInsertId();

		} else {
			print "updating ingredient";
			$stmt = $dbh->prepare( "update ".
									Ingredient::$tableName.
									" set name = :name where id = :id" );
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":name", $this->name);
			$stmt->execute();
		}
	}

	function sortIngredientASC($dbh){
        $order = "name";
        $stmt = $dbh->prepare("select * from ".Ingredient::$tableName." ORDER BY $order");
        $stmt->execute();
        $result = array();
		while($row = $stmt->fetch() ){
			$p = new Ingredient();
			$p->copyFromRow($row);
			$result[] = $p;
		}
		return $result;
	}
}

?>
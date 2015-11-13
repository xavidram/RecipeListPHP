<?php
class units_of_measure
{
	public static $tableName = "units_of_measure";
	
	public $id;
	public $name;

	public $errors = [];
	
	function copyFromRow( $row ) 
	{
		$this->id= $row['id'];
		$this->name = $row['name'];
	}
	
	static function findAll( $dbh ) {
		$stmt = $dbh->prepare( "select * from ".units_of_measure::$tableName );
		$stmt->execute();
		$result = array();
		while( $row = $stmt->fetch() ) {
			$p = new units_of_measure();
			$p->copyFromRow( $row );
			$result[] = $p;
		}
		return $result;
	}

	function findName($id,$dbh){
			$stmt = $dbh->prepare("select * from ". units_of_measure::$tableName." where id = :id;");
			$stmt->bindParam(":id",$id);
			$stmt->execute();
			$row = $stmt->fetch();
			$p = new units_of_measure();
			$p->copyFromRow($row);
			return $p->name;
		}

	function getErrors() {
		if (count($this->errors) > 0 ) {
			return implode($this->errors, "<br/>");
		}
		return "";
	}

	function sortUnitsASC($dbh){
		$order = "name";
        $stmt = $dbh->prepare("select * from ".units_of_measure::$tableName." ORDER BY $order");
        $stmt->execute();
        $result = array();
		while($row = $stmt->fetch() ){
			$p = new units_of_measure();
			$p->copyFromRow($row);
			$result[] = $p;
		}
		return $result;
	}

}
?>
<?php

class Step{
		public static $tableName = "steps";
		
		# db columns
		public $id;
		public $recipe_id;
		public $stepno;
		public $text;

		function copyFromRow($row){ 
			$this->id = $row['id'];
			$this->recipe_id = $row['recipe_id'];
			$this->stepno = $row['stepno'];
			$this->text= $row['text'];
		}
		
		function find($id,$dbh){
			$stmt = $dbh->prepare("select * from ". Step::$tableName." where id = :id;");
			$stmt->bindParam(":id",$id);
			$stmt->execute();
			$row = $stmt->fetch();
			$this->copyFromRow($row);
		}
		
		function findAll($dbh){
			$stmt = $dbh->prepare("select * from ".Step::$tableName );
			$stmt->execute();
			
			$result = array();
			while($row = $stmt->fetch() ){
				$p = new Step();
				$p->copyFromRow($row);
				if($row->recipe_id == $this->id){
					$result[] = $p;
				}
			}
			return $result;
		}

		function findAllSteps($dbh,$recipe_id){
			$stmt = $dbh->prepare("select * from ".Step::$tableName );
			$stmt->execute();
			
			$result = array();
			while($row = $stmt->fetch() ){
				$p = new Step();
				$p->copyFromRow($row);
				if($p->recipe_id == $recipe_id){
					$result[] = $p;
				}
			}
			return $result;
		}

		function removeStep($stepid,$dbh){
			$stmt = $dbh->prepare("DELETE FROM ".Step::$tableName ." WHERE `id' = :id");
			$stmt->bindParam(":id",$stepid);
			$stmt->execute();
		}

		function updateStep($dbh){
			$stmt = $dbh->prepare("UPDATE ".Step::$tableName ." SET `id`=?,`recipe_id`=?,`stepno`=?,`text`=? WHERE `id` = :id");
			$stmt->bindParam(":id",$this->id);
			$stmt->bindParam(1,$this->id);
			$stmt->bindParam(2,$this->recipe_id);
			$stmt->bindParam(3,$this->stepno);
			$stmt->bindParam(4,$this->text);
			$stmt->execute();

		}

		function findByName($dbh,$keyword){
			$stmt = $dbh->prepare("select * from ".Recipe::$tableName." WHERE name LIKE  '%".$keyword."%'");
			$stmt->execute();
			$row = $stmt->fetch();
				$p = new Recipe();
				$p->copyFromRow($row);
			return $p;
		}

		function insertStep($dbh){
			$stmt = $dbh->prepare("INSERT INTO `recipes`.`steps` (`id`, `recipe_id`, `stepno`, `text`) VALUES (NULL, ?, ?, ?)");
			$stmt->bindParam(1,$this->recipe_id);
			$stmt->bindParam(2,$this->stepno);
			$stmt->bindParam(3,$this->text);
			$stmt->execute();
		}
		
		function sortBy($dbh,$sortBy){
			$valid =array("id","recipe_id","stepno");
			$key = array_search($sortBy,$valid);	
			if($key != false){
                $stmt = $dbh->prepare("select * from ".Step::$tableName." ORDER BY $sortBy");
                $stmt->execute();
                $result = array();
				while($row = $stmt->fetch() ){
					$p = new Step();
					$p->copyFromRow($row);
					$result[] = $p;
				}
				return $result;
            }
			
		}
		
		function sortByStep($dbh){
	        $order = "stepno";
	        $stmt = $dbh->prepare("select * from ".Step::$tableName." ORDER BY $order");
	        $stmt->execute();
	        $result = array();
				while($row = $stmt->fetch() ){
					$p = new Step();
					$p->copyFromRow($row);
					$result[] = $p;
				}
			return $result;
		}

		function __toString(){
			return $this->id ." ". $this->stepno ." ". $this->text;

		}
	}


?>
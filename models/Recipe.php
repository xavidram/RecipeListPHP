<?php 

	

	class Recipe{
		public static $tableName = "recipes";
		
		# db columns
		public $id;
		public $name;
		public $description;
		public $img_url;
		public $prep_time;
		public $total_time;
		public $rating;
		
		function copyFromRow($row){ 
			$this->id = $row['id'];
			$this->name = $row['name'];
			$this->description = $row['description'];
			$this->img_url= $row['img_url'];
			$this->prep_time = $row['prep_time'];
			$this->total_time = $row['total_time'];
			$this->rating = $row['rating']; 
		}
		
		function find($id,$dbh){
			$stmt = $dbh->prepare("select * from ". Recipe::$tableName." where id = :id;");
			$stmt->bindParam(":id",$id);
			$stmt->execute();
			$row = $stmt->fetch();
			$this->copyFromRow($row);
		}
		
		static function findAll($dbh){
			$stmt = $dbh->prepare("select * from ".Recipe::$tableName );
			$stmt->execute();
			
			$result = array();
			while($row = $stmt->fetch() ){
				$p = new Recipe();
				$p->copyFromRow($row);
				$result[] = $p;
			}
			return $result;
		}
		
		function sortBy($dbh,$sortBy){
			$valid =array("name","prep_time","total_time","rating");
			$key = array_search($sortBy,$valid);	
			if($key != false){
                $stmt = $dbh->prepare("select * from ".Recipe::$tableName." ORDER BY $sortBy");
                $stmt->execute();
                $result = array();
				while($row = $stmt->fetch() ){
					$p = new Recipe();
					$p->copyFromRow($row);
					$result[] = $p;
				}
				return $result;
            }
			
		}

		function save($dbh){
			if(!$this->id){
				$sql = "INSERT INTO ".Recipe::$tableName
					." (name, description, img_url, prep_time, total_time, rating) "
						." VALUES(?, ?, ?, ?, ?, 0)";
				
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(1,$this->name);
				$stmt->bindParam(2,$this->description);
				$stmt->bindParam(3,$this->img_url);
				$stmt->bindParam(4,$this->prep_time);
				$stmt->bindParam(5,$this->total_time);
				$stmt->execute();
				
				$this->id = $dbh->lastInsertId();
			}
			
		}
		
		function getLastInsertId($dbh){
			return $dbh->lastInsertId();
		}

		function getSteps(){
			$steps = Step::findAllSteps($dbh,$recipe_id);
			return $steps;
		}

		function __toString(){
			return $this->name ." ". $this->id ." ". $this->description;
		}
		
		function findByKeyword($dbh,$keyword){
			$stmt = $dbh->prepare("select * from ".Recipe::$tableName." WHERE name LIKE  '%".$keyword."%' OR description LIKE '%".$keyword."%'");
			$stmt->execute();

			$result = array();
			while($row = $stmt->fetch() ){
				$p = new Recipe();
				$p->copyFromRow($row);
				$result[] = $p;
			}
			return $result;
		}

	}

?>
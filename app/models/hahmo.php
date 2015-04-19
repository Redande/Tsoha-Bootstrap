<?php

class Hahmo extends BaseModel{
	public $id, $name, $roles, $abilities;

	public function __construct($attributes){
		parent::__construct($attributes);
		$this->validators = array('validate_name');
	}

	public static function all(){
		$query = DB::connection()->prepare('SELECT * FROM Hahmo');
		$query->execute();

		$rows = $query->fetchAll();
		$hahmot = array();

		foreach($rows as $row){
			$hahmot[] = new Hahmo(array(
				'id' => $row['id'],
				'name' => $row['nimi'],
				'roles' => Hahmo::roles($row['id']),
				'abilities' => Hahmo::abilities($row['id'])
			));
		}

		return $hahmot;
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Hahmo WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$hahmo = new Hahmo(array(
				'id' => $row['id'],
				'name' => $row['nimi'],
				'roles' => Hahmo::roles($row['id']),
				'abilities' => Hahmo::abilities($row['id'])
			));

			return $hahmo;
		}

		return null;
	}

	public static function roles($id){
		$query = DB::connection()->prepare('SELECT * FROM Liitos2 WHERE hahmo = :id');
		$query->execute(array('id' => $id));
		$row = $query->fetch();
		$roolit = array();

		if($row){
			$roolit = $row['roolit'];
		}

		return $roolit;
	}

	public static function abilities($id){
		$query = DB::connection()->prepare('SELECT * FROM Taito WHERE hahmo = :id');
		$query->execute(array('id' => $id));
		$row = $query->fetch();
		$taidot = array();

		if($row){
			$taidot = $row['hahmo'];
		}

		return $taidot;
	}

	public function save(){
		$query = DB::connection()->prepare('INSERT INTO Hahmo (nimi) VALUES (:name) RETURNING id');

		$query->execute(array('name' => $this->name));
		Kint::dump($this->name . $this->id);
		$row = $query->fetch();

		Kint::trace();
		Kint::dump($row);

		$this->id = $row['id'];
	}

	public function validate_name(){
		$errors = array();
		if($this->name == '' || $this->name == null){
			$errors[] = "Field 'name' can't be empty!";
		}
		if(strlen($this->name) < 2) {
			$errors[] = "Name must be atleast 2 characters long!";
		}

		return $errors;
	}
}
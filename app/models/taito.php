<?php

class Taito extends BaseModel{
	public $id, $name, $description, $manacost;

	public function __construct($attributes){
		parent::__construct($attributes);
		$this->validators = array('validate_name');
	}

	public static function all(){
		$query = DB::connection()->prepare('SELECT * FROM Taito');
		$query->execute();

		$rows = $query->fetchAll();
		$taidot = array();

		foreach($rows as $row){
			$taidot[] = new Taito(array(
				'id' => $row['id'],
				'name' => $row['nimi'],
				'description' => $row['kuvaus'],
				'manacost' => $row['manacost']
			));
		}

		return $taidot;
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Taito WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$taito = new Taito(array(
				'id' => $row['id'],
				'name' => $row['nimi'],
				'description' => $row['kuvaus'],
				'manacost' => $row['manacost']
			));

			return $taito;
		}

		return null;
	}

	public function save(){
		$query = DB::connection()->prepare('INSERT INTO Taito (nimi, kuvaus, manacost) VALUES (:name, :description, :manacost) RETURNING id');

		$query->execute(array('name' => $this->name, 'description' => $this->description, 'manacost' => $this->manacost));
		// Kint::dump($this->name . $this->id);
		$row = $query->fetch();

		// Kint::trace();
		// Kint::dump($row);

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
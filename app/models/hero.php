<?php

class Hero extends BaseModel{
	public $id, $name, $roles;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	public static function all(){
		$query = DB::connection()->prepare('SELECT * FROM Hero');
		$query->execute();

		$rows = $query->fetchAll();
		$heroes = array();

		foreach($rows as $row){
			$heroes[] = new Hero(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'roles' => Hero::roles($row['id'])
			));
		}

		return $heroes;
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Hero WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$hero = new Hero(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'roles' => Hero::roles($row['id'])
			));

			return $hero;
		}

		return null;
	}

	public static function roles($id){
		$query = DB::connection()->prepare('SELECT * FROM Join WHERE hero = :id');
		$query->execute(array('id' => $id));
		$row = $query->fetch();
		$roles = array();

		if($row){
			$roles = $row['role'];
		}

		return $roles;
	}

	public function save(){
		$query = DB::connection()->prepare('INSERT INTO Hero (name) VALUES (:name) RETURNING id');

		$query->execute(array('name' => $this->name));
		$row = $query->fetch();

		$this->id = $row['id'];
	}

	public function update(){
		$query = DB::connection()->prepare('UPDATE Hero SET name = :name WHERE id = :id');

		$query->execute(array('id' => $this->id));
	}

	public function destroy(){
		$query = DB::connection()->prepare('DELETE FROM Hero WHERE id = :id');

		$query->execute(array('id' => $this->id));
	}
}
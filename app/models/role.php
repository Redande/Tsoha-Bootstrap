<?php

class Role extends BaseModel{
	public $id, $name, $description, $heroes;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	public static function all(){
		$query = DB::connection()->prepare('SELECT * FROM Role');
		$query->execute();

		$rows = $query->fetchAll();
		$roles = array();

		foreach($rows as $row){
			$roles[] = new Role(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'description' => $row['description'],
				'heroes' => Role::heroes($row['id'])
			));
		}
		return $roles;
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Role WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$role = new Role(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'description' => $row['description'],
				'heroes' => Role::heroes($row['id'])
			));

			return $role;
		}

		return null;
	}

	public static function heroes($id){
		$query = DB::connection()->prepare('SELECT hero FROM JoinTable WHERE role = :role');
		$query->execute(array('role' => $id));
		$rows = $query->fetchAll();
		$heroes = array();

		foreach($rows as $row){
			$heroes[] = array($row['hero'], self::getHeroName($row['hero']));
		}

		return $heroes;
	}

	public function getHeroName($id){
		$query = DB::connection()->prepare('SELECT name FROM Hero WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();
		$heroName = $row['name'];
		return $heroName;
	}

	public function save(){
		$query = DB::connection()->prepare('INSERT INTO Role (name, description) VALUES (:name, :description) RETURNING id');

		$query->execute(array('name' => $this->name, 'description' => $this->description));
		$row = $query->fetch();

		$this->id = $row['id'];
	}

	public function update(){
		$query = DB::connection()->prepare('UPDATE Role SET name = :name, description = :description WHERE id = :id');

		$query->execute(array('id' => $this->id, 'name' => $this->name, 'description' => $this->description));

		$row = $query->fetch();
	}

	public function destroy(){
		self::deleteHeroes();

		$query = DB::connection()->prepare('DELETE FROM Role WHERE id = :id');

		$query->execute(array('id' => $this->id));
	}

	public function deleteHeroes(){
		$query = DB::connection()->prepare('DELETE FROM JoinTable WHERE role = :role');
		$query->execute(array('role' => $this->id));
	}
}
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
		$query = DB::connection()->prepare('SELECT role FROM JoinTable WHERE hero = :hero');
		$query->execute(array('hero' => $id));
		$rows = $query->fetchAll();
		$roles = array();
		
		foreach($rows as $row){
			$roles[] = array($row['role'], self::getRoleName($row['role']));
		}
		
		return $roles;
	}

	public function getRoleName($id){
		$query = DB::connection()->prepare('SELECT name FROM Role WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();
		$roleName = $row['name'];
		return $roleName;
	}

	public function save(){
		$query = DB::connection()->prepare('INSERT INTO Hero (name) VALUES (:name) RETURNING id');

		$query->execute(array('name' => $this->name));
		$row = $query->fetch();

		$this->id = $row['id'];

		foreach($this->roles as $role){
			self::addRole($role);
		}
	}

	public function update(){
		$query = DB::connection()->prepare('UPDATE Hero SET name = :name WHERE id = :id');

		$query->execute(array('id' => $this->id, 'name' => $this->name));

		$row = $query->fetch();

		self::deleteRoles();

		foreach($this->roles as $role){
			self::addRole($role);
		}
	}

	public function destroy(){
		self::deleteRoles();
		$query = DB::connection()->prepare('DELETE FROM Hero WHERE id = :id');
		$query->execute(array('id' => $this->id));
	}

	public function deleteRoles(){
		$query = DB::connection()->prepare('DELETE FROM JoinTable WHERE hero = :hero');
		$query->execute(array('hero' => $this->id));
	}

	public function addRole($role){
		$query = DB::connection()->prepare('INSERT INTO JoinTable (hero, role) VALUES (:hero, :role) RETURNING id');

		$query->execute(array('hero' => $this->id, 'role' => $role));

		$row = $query->fetch();
	}
}
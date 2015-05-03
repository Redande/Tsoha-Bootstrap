<?php

class User extends BaseModel{
	public $id, $username, $password;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	public static function authenticate($username, $password){
		$query = DB::connection()->prepare('SELECT * FROM Account WHERE username = :username AND password = :password LIMIT 1', array('username' => $username, 'password' => $password));
		$query->execute(array('username' => $username, 'password' => $password));
		$row = $query->fetch();
		Kint::dump($row);
		if($row){
			$user = new User(array(
				'id' => $row['id'],
				'username' => $row['username'],
				'password' => $row['password']
				));

			return $user;
		}else{
			return null;
		}
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Account WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$user = new User(array(
				'id' => $row['id'],
				'username' => $row['username'],
				'password' => $row['password']
			));

			return $user;
		}

		return null;
	}

	public function save(){
		$query = DB::connection()->prepare('INSERT INTO Account (username, password) VALUES (:username, :password) RETURNING id');

		$query->execute(array('username' => $this->username, 'password' => $this->password));
		$row = $query->fetch();

		$this->id = $row['id'];
	}
}
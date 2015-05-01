<?php

class User extends BaseModel{
	public $id, $username, $password;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	public static function authenticate($kayttajatunnus, $salasana){
		$query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE kayttajatunnus = :kayttajatunnus AND salasana = :salasana LIMIT 1', array('kayttajatunnus' => $kayttajatunnus, 'salasana' => $salasana));
		$query->execute();
		$row = $query->fetch();
		if($row){
			$user = new User(array(
				'id' => $row['id'],
				'kayttajatunnus' => $row['kayttajatunnus'],
				'salasana' => $row['salasana']
				));

			return $user;
		}else{
			return null;
		}
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$user = new User(array(
				'id' => $row['id'],
				'kayttajatunnus' => $row['kayttajatunnus'],
				'salasana' => $row['salasana']
			));

			return $user;
		}

		return null;
	}

	public function save(){
		$query = DB::connection()->prepare('INSERT INTO Kayttaja (kayttajatunnus, salasana) VALUES (:kayttajatunnus, :salasana) RETURNING id');

		$query->execute(array('kayttajatunnus' => $this->kayttajatunnus, 'salasana' => $this->salasana));
		$row = $query->fetch();

		$this->id = $row['id'];
	}
}
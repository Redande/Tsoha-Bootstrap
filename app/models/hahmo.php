<?php

class Hahmo extends BaseModel{
	public $id, $name, $roles, $abilities;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	public static function all(){
		$query = DB::connection()->prepare('SELECT * FROM Hahmo');
		$query->execute();

		$rows = $query->fetchAll();
		$hahmot = array();

		foreach($rows as $row){
			$hahmot[] = new Hahmo(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'roles' => Hahmo::roles($row['id']),
				'abilities' => abilities($row['id'])
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
				'abilities' => abilities($row['id'])
			));

			return $hahmo;
		}

		return null;
	}

	public static function roles($id){
		$query = DB::connection()->prepare('SELECT * FROM Liitos2 WHERE hahmo = :id');
		$query->execute(array('hahmo' => $id));
		$row = $query->fetch();
		$roolit = array();

		if($row){
			$roolit = $row['roolit'];
		}

		return $roolit;
	}

	public static function abilities($id){
		$query = DB::connection()->prepare('SELECT * FROM Taito WHERE hahmo = :id');
		$query->execute(array('hahmo' => $id));
		$rows = $query->fetch();
		$taidot = array();

		foreach($rows as $row){
			$taidot = $row['hahmo'];
		}

		return $taidot;
	}
}
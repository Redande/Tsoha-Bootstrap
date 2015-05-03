<?php

class HeroController extends BaseController{
	public static function index(){
		$heroes = Hero::all();

		View::make('hero/list.html', array('heroes' => $heroes));
	}

	public static function show($id){
		$hero = Hero::find($id);
		
		View::make('hero/heroview.html', array('hero' => $hero, 'roles' => $hero->roles($id)));
	}

	public static function store(){
		$params = $_POST;

		$roles = $params['roles'];

		$hero = new Hero(array(
			'name' => $params['name'],
			'roles' => array()
		));

		foreach($roles as $role){
			$hero->roles[] = $role;
		}

		$hero->save();

		Redirect::to('/heroes/' . $hero->id, array('message' => 'Hero added successfully to the hero library!'));
	}

	public static function create(){
		self::check_logged_in();

		View::make('hero/newHero.html', array('roles' => Role::all()));
	}

	public static function edit($id){
		self::check_logged_in();

		$hero = Hero::find($id);
		View::make('hero/edit.html', array('attributes' => $hero, 'roles' => Role::all()));
	}

	public static function update($id){
		$params = $_POST;

		$roles = $params['roles'];

		$attributes = array(
			'id' => $id,
			'name' => $params['name']
		);


		$hero = new Hero($attributes);

		foreach($roles as $role){
			$hero->roles[] = $role;
		}

		$hero->update();

		Redirect::to('/heroes/' . $hero->id, array('message' => 'Hero has been edited successfully!'));
	}

	public static function destroy($id){
		self::check_logged_in();
		
		$hero = Hero::find($id);

		$hero->destroy();

		Redirect::to('/heroes', array('message' => 'Hero has been deleted successfully!'));
	}
}
<?php

class HeroController extends BaseController{
	public static function index(){
		$heroes = Hero::all();

		View::make('hero/list.html', array('heroes' => $heroes));
	}

	public static function show($id){
		$hero = Hero::find($id);

		View::make('hero/heroview.html', array('hero' => $hero));
	}

	public static function store(){
		$params = $_POST;

		$hero = new Hero(array(
			'name' => $params['name'],
			'roles' => null
		));

		$hero->save();

		Redirect::to('/heroes/' . $hero->id, array('message' => 'Hero added successfully to the hero library!'));
	}

	public static function create(){
		View::make('hero/newHero.html');
	}

	public static function edit($id){
		$hero = Hero::find($id);
		View::make('hero/edit.html', array('attributes' => $hero));
	}

	public static function update($id){
		$params = $_POST;

		$attributes = array(
			'id' => $id,
			'name' => $params['name']
		);


		$hero = new Hero($attributes);
		$hero->update();

		Redirect::to('/heroes/' . $hero->id, array('message' => 'Hero has been edited successfully!'));
	}

	public static function destroy($id){
		$hero = Hero::find($id);

		$hero->destroy();

		Redirect::to('/heroes', array('message' => 'Hero has been deleted successfully!'));
	}
}
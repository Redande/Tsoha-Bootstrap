<?php

class HeroController extends BaseController{
	public static function index(){
		$heroes = Hahmo::all();

		View::make('sankari/lista.html', array('heroes' => $heroes));
	}

	public static function show($id){
		$hero = Hahmo::find($id);

		View::make('sankari/heroview.html', array('hero' => $hero));
	}

	public static function store(){
		$params = $_POST;

		$hero = new Hahmo(array(
			'name' => $params['name'],
			'roles' => null,
			'abilities' => null
		));

		Kint::dump($params);

		$hero->save();

		Redirect::to('/heroes/' . $hero->id, array('message' => 'Hero added successfully to the hero library!'));
	}

	public static function create(){
		View::make('sankari/newHero.html');
	}

	public static function edit($id){
		$hero = Hahmo::find($id);
		View::make('sankari/edit.html', array('attributes' => $hero));
	}

	public static function update($id){
		$params = $_POST;

		$attributes = array(
			'id' => $id,
			'name' => $params['name']
		);

		$hero = Hahmo::find($id);
		Kint::dump($hero);
		// $errors = $hero->errors();

		// if(count($errors) > 0){
		// View::make('sankari/edit.html', array('errors' => $errors, 'attributes' => $attributes));
		// }else{

		$hero->update();

		Redirect::to('/heroes/' . $hero->id, array('message' => 'Hero has been edited successfully!'));
		// }
	}

	public static function destroy($id){
		$hero = Hahmo::find($id);

		$hero->destroy();

		Redirect::to('/heroes', array('message' => 'Hero has been deleted successfully!'));
	}
}
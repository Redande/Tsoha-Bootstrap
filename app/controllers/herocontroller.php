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

		// Redirect::to('/heroes' . $hero->id, array('message' => 'Hero added successfully to the hero library!'));
	}

	public static function create(){
		View::make('sankari/newHero.html');
	}
}
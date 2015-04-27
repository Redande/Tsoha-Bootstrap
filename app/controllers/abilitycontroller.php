<?php

class AbilityController extends BaseController{
	public static function index(){
		$abilities = Taito::all();

		View::make('taito/lista.html', array('abilities' => $abilities));
	}

	public static function show($id){
		$ability = Taito::find($id);

		View::make('taito/abilityview.html', array('ability' => $ability));
	}

	public static function store(){
		$params = $_POST;

		$ability = new Taito(array(
			'name' => $params['name'],
			'description' => $params['description'],
			'manacost' => $params['manacost'],
			'hero' => null,
			'item' => null
		));

		Kint::dump($params);

		$ability->save();

		Redirect::to('/abilities/' . $ability->id, array('message' => 'Ability added successfully to the ability library!'));
	}

	public static function create(){
		View::make('taito/newAbility.html');
	}
}
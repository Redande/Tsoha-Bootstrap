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
}
<?php

class HeroController extends BaseController{
	public static function index(){
		$heroes = Hahmo::all();

		View::make('sankari/lista.html', array('heroes' => $heroes));
	}
}
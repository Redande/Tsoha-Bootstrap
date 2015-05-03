<?php

class RoleController extends BaseController{
	public static function index(){
		$roles = Role::all();

		View::make('role/list.html', array('roles' => $roles));
	}

	public static function show($id){
		$role = Role::find($id);

		View::make('role/roleview.html', array('role' => $role, 'heroes' => Role::heroes($id)));
	}

	public static function store(){
		$params = $_POST;

		$role = new Role(array(
			'name' => $params['name'],
			'description' => $params['description']
		));

		$role->save();

		Redirect::to('/roles/' . $role->id, array('message' => 'Role added successfully to the role library!'));
	}

	public static function create(){
		self::check_logged_in();

		View::make('role/newRole.html');
	}

	public static function edit($id){
		self::check_logged_in();

		$role = Role::find($id);
		View::make('role/edit.html', array('attributes' => $role));
	}

	public static function update($id){
		$params = $_POST;

		$attributes = array(
			'id' => $id,
			'name' => $params['name'],
			'description' => $params['description']
		);

		$role = new Role($attributes);

		$role->update();

		Redirect::to('/roles/' . $role->id, array('message' => 'Role has been edited successfully!'));
	}

	public static function destroy($id){
		self::check_logged_in();
		
		$role = Role::find($id);

		$role->destroy();

		Redirect::to('/roles', array('message' => 'Role has been deleted successfully!'));
	}
}
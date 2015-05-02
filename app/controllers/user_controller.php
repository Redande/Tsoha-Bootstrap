<?php

class UserController extends BaseController{
  public static function login(){
      View::make('user/login.html');
  }
  public static function handle_login(){
    $params = $_POST;

    $user = User::authenticate($params['username'], $params['password']);

    Kint::dump($user);

    if(!$user){
      View::make('user/login.html', array('error' => 'Incorrect username or password!', 'username' => $params['username']));
    }else{
      $_SESSION['user'] = $user->id;

      Redirect::to('/', array('message' => 'Welcome back ' . $user->username . '!'));
    }
  }

  public static function signup(){
    View::make('user/signup.html');
  }

  public static function handle_signup(){
    $params = $_POST;

    $user = new User(array(
      'username' => $params['username'],
      'password' => $params['password']
    ));

    $user->save();
    Kint::dump($user);
    // Redirect::to('/', array('message' => 'Welcome ' . $user->username . '!'));
  }
}
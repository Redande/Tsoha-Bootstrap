<?php

class UserController extends BaseController{
  public static function login(){
      View::make('kirjautuminen/kirjautuminen.html');
  }
  public static function handle_login(){
    $params = $_POST;

    $user = User::authenticate($params['username'], $params['password']);

    if(!$user){
      View::make('kirjautuminen/kirjautuminen.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
    }else{
      $_SESSION['user'] = $user->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $user->name . '!'));
    }
  }

  public static function rekisteroityminen(){
    View::make('kirjautuminen/rekisteroityminen.html');
  }

  public static function rekisteroidy(){
    $params = $_POST;

    $user = new User(array(
      'kayttajatunnus' => $params['username'],
      'salasana' => $params['password']
    ));

    $user->save();

    Redirect::to('/', array('message' => 'Tervetuloa ' . $user->name . '!'));
  }
}
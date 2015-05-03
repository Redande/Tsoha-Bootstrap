<?php

  $routes->get('/', function() {
    HelloWorldController::etusivu();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  // $routes->get('/sankarit', function() {
  // 	HelloWorldController::hahmolista();
  // });

  // $routes->get('/roolit', function() {
  // 	HelloWorldController::roolilista();
  // });

  $routes->get('/frontpage', function() {
  	HelloWorldController::etusivu();
  });

  // $routes->get('/login', function() {
  // 	HelloWorldController::kirjaudu();
  // });

  // $routes->get('/signup', function() {
  // 	HelloWorldController::luoTili();
  // });

  // $routes->get('/hahmo', function() {
  // 	HelloWorldController::hahmoEsimerkki();
  // });

  $routes->get('/heroes', function() {
    HeroController::index();
  });

  $routes->get('/hero/:id', function($id) {
    HeroController::show($id);
  });

  $routes->post('/heroes', function() {
    HeroController::store();
  });

  $routes->get('/heroes/new', function(){
    HeroController::create();
  });

  $routes->get('/heroes/:id', function($id) {
    HeroController::show($id);
  });

  $routes->get('/heroes/:id/edit', function($id){
    HeroController::edit($id);
  });

  $routes->post('/heroes/:id/edit', function($id){
    HeroController::update($id);
  });

  $routes->post('/heroes/:id/destroy', function($id){
    HeroController::destroy($id);
  });

  $routes->get('/login', function(){
    UserController::login();
  });
  $routes->post('/login', function(){
    UserController::handle_login();
  });

  $routes->get('/signup', function(){
    UserController::signup();
  });

  $routes->post('/signup', function(){
    UserController::handle_signup();
  });

  $routes->get('/roles', function() {
    RoleController::index();
  });

  $routes->get('/role/:id', function($id) {
    RoleController::show($id);
  });

  $routes->post('/roles', function() {
    RoleController::store();
  });

  $routes->get('/roles/new', function(){
    RoleController::create();
  });

  $routes->get('/roles/:id', function($id) {
    RoleController::show($id);
  });

  $routes->get('/roles/:id/edit', function($id){
    RoleController::edit($id);
  });

  $routes->post('/roles/:id/edit', function($id){
    RoleController::update($id);
  });

  $routes->post('/roles/:id/destroy', function($id){
    RoleController::destroy($id);
  });

  $routes->post('/logout', function(){
    UserController::logout();
  });
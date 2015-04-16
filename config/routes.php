<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/sankarit', function() {
  	HelloWorldController::hahmolista();
  });

  $routes->get('/esineet', function() {
  	HelloWorldController::esinelista();
  });

  $routes->get('/taidot', function() {
  	HelloWorldController::taitolista();
  });

  $routes->get('/roolit', function() {
  	HelloWorldController::roolilista();
  });

  $routes->get('/etusivu', function() {
  	HelloWorldController::etusivu();
  });

  $routes->get('/login', function() {
  	HelloWorldController::kirjaudu();
  });

  $routes->get('/signup', function() {
  	HelloWorldController::luoTili();
  });

  $routes->get('/esine', function() {
  	HelloWorldController::esineEsimerkki();
  });

  $routes->get('/hahmo', function() {
  	HelloWorldController::hahmoEsimerkki();
  });

  $routes->get('/joukkue', function() {
  	HelloWorldController::joukkueEsimerkki();
  });

  $routes->get('/kayttaja', function() {
  	HelloWorldController::kayttajaEsimerkki();
  });

  $routes->get('/heroes', function() {
    HeroController::index();
  });

  $routes->get('/sankari/:id', function($id) {
    HeroController::show($id);
  });

  $routes->post('/heroes', function() {
    HeroController::store();
  });

  $routes->get('/heroes/new', function(){
    HeroController::create();
  });
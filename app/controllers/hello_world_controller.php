<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      $NP = Hahmo::find(1);
      $hahmot = Hahmo::all();

      Kint::dump($hahmot);
      Kint::dump($NP);
    }

    public static function hahmolista(){
      View::make('suunnitelmat/sankarit.html');
    }

    public static function esinelista(){
      View::make('suunnitelmat/esineet.html');
    }

    public static function roolilista(){
      View::make('suunnitelmat/roolit.html');
    }

    public static function taitolista(){
      View::make('suunnitelmat/taidot.html');
    }

    public static function etusivu(){
      View::make('suunnitelmat/etusivu.html');
    }

    public static function kirjaudu(){
      View::make('suunnitelmat/sisaankirjautuminen.html');
    }

    public static function luoTili(){
      View::make('suunnitelmat/kayttajatilinluominen.html');
    }

    public static function esineEsimerkki(){
      View::make('suunnitelmat/esimerkkiesinesivu.html');
    }

    public static function hahmoEsimerkki(){
      View::make('suunnitelmat/esimerkkihahmosivu.html');
    }

    public static function joukkueEsimerkki(){
      View::make('suunnitelmat/esimerkkijoukkuesivu.html');
    }

    public static function kayttajaEsimerkki(){
      View::make('suunnitelmat/esimerkkikayttajasivu.html');
    }
  }

<?php namespace Config;

define("ROOT", dirname(__DIR__) . "/");

//Path to your project's root folder
//Si su url es 'http://localhost/proyectos/redSocial/',
//FRONT_ROOT debe ser '/proyectos/redSocial/'

define("FRONT_ROOT", "/redSocial/");  
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "layout/styles/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
define("IMG_PATH", FRONT_ROOT.VIEWS_PATH . "img/");

//DB's config
define("DB_HOST", "localhost");
define("DB_NAME", "");
define("DB_USER", "");
define("DB_PASS", "");




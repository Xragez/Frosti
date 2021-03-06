<?php

session_start();

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('inventory', 'ItemController');
Routing::post('addItem', 'ItemController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::get('accountDetails', 'DefaultController');
Routing::get('recipes', 'DefaultController');
Routing::get('logout', 'SecurityController');
Routing::post('addRecipe', 'RecipeController');
Routing::get('registeredSuccessfully', 'DefaultController');
Routing::post('removeItem', 'ItemController');
Routing::post('search', 'ItemController');
Routing::run($path);

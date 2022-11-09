<?php
require_once './libs/Router.php';
require_once './app/controllers/characters-api.controller.php';
require_once './app/controllers/auth-api.controller.php';



$router = new Router();


$router->addRoute('characters', 'GET', 'CharacterApiController', 'getCharacters');
$router->addRoute('characters/:ID', 'GET', 'CharacterApiController', 'getCharacter');
$router->addRoute('characters/:ID', 'DELETE', 'CharacterApiController', 'deleteCharacter');
$router->addRoute('characters', 'POST', 'CharacterApiController', 'insertCharacter'); 
$router->addRoute('characters/orderby/:order', 'GET', 'CharacterApiController', 'orderUniverse');
$router->addRoute('characters/universe/:universe', 'GET', 'CharacterApiController', 'filterUniverse');
$router->addRoute('characters/universe/:universe/:order', 'GET', 'CharacterApiController', 'orderFilterUniverse');


$router->addRoute("auth/token", 'GET', 'AuthApiController', 'getToken');


$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

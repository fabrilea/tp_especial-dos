<?php
require_once './libs/Router.php';
require_once './app/controllers/characters-api.controller.php';
require_once './app/controllers/auth-api.controller.php';



$router = new Router();

/*Métodos de Ordenamiento*/
$router->addRoute("characters", "GET", "CharacterApiController", "getFields");


/*Funciones*/
$router->addRoute('characters/:ID', 'GET', 'CharacterApiController', 'getCharacter');
$router->addRoute('characters/:ID', 'DELETE', 'CharacterApiController', 'deleteCharacter');
$router->addRoute('characters', 'POST', 'CharacterApiController', 'insertCharacter'); 


/*Obtener token*/
$router->addRoute("auth/token", 'GET', 'AuthApiController', 'getToken');


/*Obtener Método*/
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

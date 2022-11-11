<?php
require_once './libs/Router.php';
require_once './app/controllers/characters-api.controller.php';
require_once './app/controllers/auth-api.controller.php';



$router = new Router();

/*Funciones*/
$router->addRoute('characters', 'GET', 'CharacterApiController', 'getCharacters');
$router->addRoute('characters/:ID', 'GET', 'CharacterApiController', 'getCharacter');
$router->addRoute('characters/:ID', 'DELETE', 'CharacterApiController', 'deleteCharacter');
$router->addRoute('characters', 'POST', 'CharacterApiController', 'insertCharacter'); 

/*Métodos de Ordenamiento*/
$router->addRoute('characters/orderby/id/:order', 'GET', 'CharacterApiController', 'orderId');
$router->addRoute('characters/orderby/character/:order', 'GET', 'CharacterApiController', 'orderCharacter');
$router->addRoute('characters/orderby/race/:order', 'GET', 'CharacterApiController', 'orderRace');
$router->addRoute('characters/orderby/afiliation/:order', 'GET', 'CharacterApiController', 'orderAfiliation');
$router->addRoute('characters/orderby/lgbt/:order', 'GET', 'CharacterApiController', 'orderLgbt');
$router->addRoute('characters/orderby/fem/:order', 'GET', 'CharacterApiController', 'orderFem');
$router->addRoute('characters/orderby/universe/:order', 'GET', 'CharacterApiController', 'orderUniverse');


/*Filtrar por Campo 'Universo'*/
$router->addRoute('characters/universe/:universe', 'GET', 'CharacterApiController', 'filterUniverse');
$router->addRoute('characters/universe/:universe/:order', 'GET', 'CharacterApiController', 'orderFilterUniverse');


/*Obtener token*/
$router->addRoute("auth/token", 'GET', 'AuthApiController', 'getToken');


$router->addRoute('characters/page/:page', 'GET', 'CharacterApiController', 'showLimit');

/*Obtener Método*/
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

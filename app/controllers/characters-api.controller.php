<?php

require_once './app/models/character.model.php';
require_once './app/views/api.view.php';
require_once './app/helpers/auth-api.helper.php';


class CharacterApiController {
    private $model;
    private $view;
    private $authHelper;

    private $data;

    public function __construct() {
        $this->model = new CharacterModel();
        $this->view = new ApiView();
        $this->authHelper = new AuthApiHelper();


        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getCharacter($params = null) {

        $id = $params[':ID'];

        $character = $this->model->get($id);


        if ($character)
            $this->view->response($character);
        else 
            $this->view->response("El personaje con el id= $id no existe", 404);
    }

    public function deleteCharacter($params = null) {
        $id = $params[':ID'];

        if(!$this->authHelper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }

        $character = $this->model->get($id);
        if ($character) {
            $this->model->delete($id);
            $this->view->response($character);
        } else 
            $this->view->response("El personaje con el id= $id no existe", 404);
    }

    public function insertCharacter($params = null) {
        
        if(!$this->authHelper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }
        
        $character = $this->getData();

        if ((empty($character->personaje) || empty($character->raza) 
            || empty($character->afiliacion)) 
            || (($character->universo > 5) || ($character->universo < 1))
            || (($character->lgbt > 1) || ($character->lgbt < 0)) 
            || (($character->fem > 1) || ($character->fem < 0))
            ){
            $this->view->response("Rellene los campos", 400);
        } else {
            $id = $this->model->insert($character->personaje, $character->raza, $character->afiliacion, 
                                        $character->lgbt, $character->fem, $character->universo);
            $character = $this->model->get($id);
            $this->view->response($character, 201);
        }
    }

    public function getFields($params = null) {
        $params = [
            "sort" => "asc",
            "field" => "id",
            "where" => "db_personajes.universo",
            "limit" => "18446744073709551610",
            "offset" => "0"
        ];
        if (isset($_GET['sort'])){ 
            $params["sort"] = $_GET['sort'];
        }
        if (isset($_GET['field'])){
            $params["field"] = $_GET['field'];
        }
        if (isset($_GET['where'])){
            $params["where"] = $_GET['where'];
        }
        if (isset($_GET['limit'])){
            $params["limit"] = $_GET['limit'];
            if (isset($_GET['offset'])){
                $page = (($_GET['offset']-1)*$params["limit"]);
                $params["offset"] = $page;
            }
        }
        $db = $this->model->getAllSortBy($params);
        $this->view->response($db);
    }
}

<?php

require_once './app/models/character.model.php';
require_once './app/views/api.view.php';

class CharacterApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new CharacterModel();
        $this->view = new ApiView();

        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getCharacters($params = null) {
        $characters = $this->model->getAll();
        $this->view->response($characters);
    }

    public function getCharacter($params = null) {

        $id = $params[':ID'];
        $character = $this->model->get($id);


        if ($character)
            $this->view->response($character);
        else 
            $this->view->response("El personaje con el id=$id no existe", 404);
    }

    public function deleteCharacter($params = null) {
        $id = $params[':ID'];

        $character = $this->model->get($id);
        if ($character) {
            $this->model->delete($id);
            $this->view->response($character);
        } else 
            $this->view->response("El personaje con el id=$id no existe", 404);
    }

    public function insertCharacter($params = null) {
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

    function orderUniverse($params = null){
        
        if(!empty($params[':order'])){
            $order = $params[':order'];
            if($order == "DESC" || $order == "desc"){
                $universe = $this->model->getUniverse($order);
            }else if($order == "ASC" || $order == "asc"){
                $universe = $this->model->getUniverse($order);
            }else if($order != "DESC" || $order != "desc" 
                     || $order != "ASC" || $order != "asc"){
                        return $this->view->response("el order by está mal escrito, escriba DESC, desc, ASC o asc", 404);
                     }
        }else{
            $universe = $this->model->getUniverse();
        }
        return $this->view->response($universe, 200);
    }

}

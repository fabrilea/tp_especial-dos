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

        if (empty($character->name) || empty($character->race) || empty($character->afiliation) || 
            empty($character->lgbt) || empty($character->fem) || empty($character->universe)) {
            $this->view->response("Rellene los campos", 400);
        } else {
            $id = $this->model->insert($character->name, $character->race, $character->afiliation, 
                                        $character->lgbt, $character->fem, $character->universe);
            $character = $this->model->get($id);
            $this->view->response($character, 201);
        }
    }

}

<?php

require_once './app/models/character.model.php';
require_once './app/models/order.model.php';
require_once './app/views/api.view.php';
require_once './app/helpers/auth-api.helper.php';


class CharacterApiController {
    private $model;
    private $orderModel;
    private $view;
    private $authHelper;

    private $data;

    public function __construct() {
        $this->model = new CharacterModel();
        $this->orderModel = new OrderModel();
        $this->view = new ApiView();
        $this->authHelper = new AuthApiHelper();


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

        if(!$this->authHelper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }

        $character = $this->model->get($id);
        if ($character) {
            $this->model->delete($id);
            $this->view->response($character);
        } else 
            $this->view->response("El personaje con el id=$id no existe", 404);
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

    function orderId($params = null){
        
        if(!empty($params[':order'])){
            $order = $params[':order'];
            $id = $this->orderModel->getIdOrder($order);
        }

        return $this->view->response($id, 200);
        
    }
    
    function orderCharacter($params = null){
        
        if(!empty($params[':order'])){
            $order = $params[':order'];
            if($order == "DESC" || $order == "desc"){
                $character = $this->orderModel->getCharacterOrder($order);
            }else if($order == "ASC" || $order == "asc"){
                $character = $this->orderModel->getCharacterOrder($order);
            }else if($order != "DESC" || $order != "desc" 
                     || $order != "ASC" || $order != "asc"){
                        return $this->view->response("el order by está mal escrito, escriba DESC, desc, ASC o asc", 404);
                     }
        }else{
            $character = $this->orderModel->getCharacterOrder();
        }
        return $this->view->response($character, 200);
    }

    function orderRace($params = null){
        
        if(!empty($params[':order'])){
            $order = $params[':order'];
            if($order == "DESC" || $order == "desc"){
                $race = $this->orderModel->getRaceOrder($order);
            }else if($order == "ASC" || $order == "asc"){
                $race = $this->orderModel->getRaceOrder($order);
            }else if($order != "DESC" || $order != "desc" 
                     || $order != "ASC" || $order != "asc"){
                        return $this->view->response("el order by está mal escrito, escriba DESC, desc, ASC o asc", 404);
                     }
        }else{
            $race = $this->orderModel->getRaceOrder();
        }
        return $this->view->response($race, 200);
    }

    function orderAfiliation($params = null){
        
        if(!empty($params[':order'])){
            $order = $params[':order'];
            if($order == "DESC" || $order == "desc"){
                $afiliation = $this->orderModel->getAfiliationOrder($order);
            }else if($order == "ASC" || $order == "asc"){
                $afiliation = $this->orderModel->getAfiliationOrder($order);
            }else if($order != "DESC" || $order != "desc" 
                     || $order != "ASC" || $order != "asc"){
                        return $this->view->response("el order by está mal escrito, escriba DESC, desc, ASC o asc", 404);
                     }
        }else{
            $afiliation = $this->orderModel->getAfiliationOrder();
        }
        return $this->view->response($afiliation, 200);
    }

    function orderLgbt($params = null){
        
        if(!empty($params[':order'])){
            $order = $params[':order'];
            if($order == "DESC" || $order == "desc"){
                $lgbt = $this->orderModel->getLgbtOrder($order);
            }else if($order == "ASC" || $order == "asc"){
                $lgbt = $this->orderModel->getLgbtOrder($order);
            }else if($order != "DESC" || $order != "desc" 
                     || $order != "ASC" || $order != "asc"){
                        return $this->view->response("el order by está mal escrito, escriba DESC, desc, ASC o asc", 404);
                     }
        }else{
            $lgbt = $this->orderModel->getLgbtOrder();
        }
        return $this->view->response($lgbt, 200);
    }

    function orderFem($params = null){
        
        if(!empty($params[':order'])){
            $order = $params[':order'];
            if($order == "DESC" || $order == "desc"){
                $fem = $this->orderModel->getFemOrder($order);
            }else if($order == "ASC" || $order == "asc"){
                $fem = $this->orderModel->getFemOrder($order);
            }else if($order != "DESC" || $order != "desc" 
                     || $order != "ASC" || $order != "asc"){
                        return $this->view->response("el order by está mal escrito, escriba DESC, desc, ASC o asc", 404);
                     }
        }else{
            $fem = $this->orderModel->getUniverseOrder();
        }
        return $this->view->response($fem, 200);
    }

    function orderUniverse($params = null){
        
        if(!empty($params[':order'])){
            $order = $params[':order'];
            if($order == "DESC" || $order == "desc"){
                $universe = $this->orderModel->getUniverseOrder($order);
            }else if($order == "ASC" || $order == "asc"){
                $universe = $this->orderModel->getUniverseOrder($order);
            }else if($order != "DESC" || $order != "desc" 
                     || $order != "ASC" || $order != "asc"){
                        return $this->view->response("el order by está mal escrito, escriba DESC, desc, ASC o asc", 404);
                     }
        }else{
            $universe = $this->orderModel->getUniverseOrder();
        }
        return $this->view->response($universe, 200);
    }

    function filterUniverse($params = null){

        if(!empty($params[':universe'])){
            $query = $params[':universe'];
            $universe = $this->model->getUniverse($query);
        if(empty($universe)){
                return $this->view->response("El universo no está catalogado", 404);
        }
        return $this->view->response($universe, 200);

    }
    }

    function OrderFilterUniverse($params = null){

        if(!empty($params[':universe'])){
            $queryUniverse = $params[':universe'];
            if(!empty($params[':order'])){
                $queryOrder = $params[':order'];
                $universe = $this->model->getFilterUniverse($queryOrder, $queryUniverse);
            }
        }
        return $this->view->response($universe, 200);
    }

    public function showLimit($params = null){

        if(!empty($params[':page'])){

            $page = $params[':page'];
            $number = ($page - 1)*5 ;
 
            $characters = $this->orderModel->getLimit($number);

            return $this->view->response($characters, 200);

        }
    }
}

<?php

class OrderModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db-marvel;charset=utf8', 'root', '');
    }


    function getIdOrder($order = null) {

        switch($order){
            case 'DESC':
            case'desc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                             as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                             as universo 
                                             FROM db_personajes 
                                             INNER JOIN db_universos 
                                             on db_personajes.universo = db_universos.id
                                             ORDER BY db_personajes.id desc');
            break;

            case 'ASC':
            case'asc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                             as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                             as universo 
                                             FROM db_personajes 
                                             INNER JOIN db_universos 
                                             on db_personajes.universo = db_universos.id
                                             ORDER BY db_personajes.id asc');
            break;
            
            default:
                $query = $this->db->prepare('SELECT db_personajes.id 
                                             as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                             as universo 
                                             FROM db_personajes 
                                             INNER JOIN db_universos 
                                             on db_personajes.universo = db_universos.id');
            break;
            }
            $query->execute();
            $id = $query->fetchAll(PDO::FETCH_OBJ);
            return $id;
        }

    function getCharacterOrder($order = null) {

        switch($order){
            case 'DESC':
            case'desc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id
                                                ORDER BY db_personajes.personaje desc');
            break;

            case 'ASC':
            case'asc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id
                                                ORDER BY db_personajes.personaje asc');
            break;
            
            default:
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id');
            break;
            }
            $query->execute();
            $character = $query->fetchAll(PDO::FETCH_OBJ);
            return $character;
        }


    function getRaceOrder($order = null) {

        switch($order){
            case 'DESC':
            case'desc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id
                                                ORDER BY db_personajes.raza desc');
            break;

            case 'ASC':
            case'asc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id
                                                ORDER BY db_personajes.raza asc');
            break;
            
            default:
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id');
            break;
            }
            $query->execute();
            $race = $query->fetchAll(PDO::FETCH_OBJ);
            return $race;
        }
            

    function getAfiliationOrder($order = null) {

        switch($order){
            case 'DESC':
            case'desc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id
                                                ORDER BY db_personajes.afiliacion desc');
            break;

            case 'ASC':
            case'asc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id
                                                ORDER BY db_personajes.afiliacion asc');
            break;
            
            default:
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id');
            break;
            }
            $query->execute();
            $afiliation = $query->fetchAll(PDO::FETCH_OBJ);
            return $afiliation;
        }


    function getLgbtOrder($order = null) {

        switch($order){
            case 'DESC':
            case'desc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id
                                                ORDER BY db_personajes.lgbt desc');
            break;

            case 'ASC':
            case'asc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id
                                                ORDER BY db_personajes.lgbt asc');
            break;
            
            default:
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id');
            break;
            }
            $query->execute();
            $lgbt = $query->fetchAll(PDO::FETCH_OBJ);
            return $lgbt;
        }

    function getFemOrder($order = null) {

        switch($order){
            case 'DESC':
            case'desc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id
                                                ORDER BY db_personajes.fem desc');
            break;

            case 'ASC':
            case'asc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id
                                                ORDER BY db_personajes.fem asc');
            break;
            
            default:
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id');
            break;
            }
            $query->execute();
            $fem = $query->fetchAll(PDO::FETCH_OBJ);
            return $fem;
        }

    function getUniverseOrder($order = null) {

        switch($order){
            case 'DESC':
            case'desc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id
                                                ORDER BY db_personajes.universo desc');
            break;

            case 'ASC':
            case'asc':
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id
                                                ORDER BY db_personajes.universo asc');
            break;
            
            default:
                $query = $this->db->prepare('SELECT db_personajes.id 
                                                as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                as universo 
                                                FROM db_personajes 
                                                INNER JOIN db_universos 
                                                on db_personajes.universo = db_universos.id');
            break;
            }
            $query->execute();
            $universe = $query->fetchAll(PDO::FETCH_OBJ);
            return $universe;
        }
}
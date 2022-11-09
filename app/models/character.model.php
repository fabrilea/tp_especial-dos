<?php

class CharacterModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db-marvel;charset=utf8', 'root', '');
    }

    
    
    public function getAll() {

        
        $query = $this->db->prepare('SELECT db_personajes.id as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                     as universo 
                                     FROM db_personajes 
                                     INNER JOIN db_universos on db_personajes.universo = db_universos.id
                                     ORDER BY db_personajes.id asc');
        $query->execute();

        $characters = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $characters;
    }

    public function get($id) {
        $query = $this->db->prepare('SELECT db_personajes.id as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                     as universo 
                                     FROM db_personajes 
                                     INNER JOIN db_universos on db_personajes.universo = db_universos.id 
                                     WHERE db_personajes.id = ?');
        $query->execute([$id]);
        $character = $query->fetch(PDO::FETCH_OBJ);
        
        return $character;
    }



    public function insert($character, $race, $afiliation, $lgbt, $fem, $universe) {
        $query = $this->db->prepare("INSERT INTO db_personajes (personaje, raza, afiliacion, lgbt, fem, universo) 
                                    VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$character, $race, $afiliation, $lgbt, $fem, $universe]);

        return $this->db->lastInsertId();
    }


    
    function delete($id) {
        $query = $this->db->prepare('DELETE FROM db_personajes WHERE id = ?');
        $query->execute([$id]);
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

        function getUniverse($universe){
            
            $query = $this->db->prepare('SELECT db_personajes.id as id, imagen,personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                         as universo FROM db_personajes 
                                         INNER JOIN db_universos on db_personajes.universo = db_universos.id 
                                         WHERE db_personajes.universo = ?');
            $query->execute([$universe]);
    
            return $query->fetchAll(PDO::FETCH_OBJ);

        }

        function getFilterUniverse($order, $universe){

            switch($order){
                case 'DESC':
                case'desc':
                    $query = $this->db->prepare('SELECT db_personajes.id 
                                                 as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                 as universo 
                                                 FROM db_personajes 
                                                 INNER JOIN db_universos 
                                                 on db_personajes.universo = db_universos.id
                                                 WHERE db_personajes.universo = ?
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
                                                 WHERE db_personajes.universo = ?
                                                 ORDER BY db_personajes.id asc');
                break;
                
                default:
                    $query = $this->db->prepare('SELECT db_personajes.id 
                                                 as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                                 as universo 
                                                 FROM db_personajes 
                                                 INNER JOIN db_universos 
                                                 on db_personajes.universo = db_universos.id
                                                 WHERE db_personajes.universo = ?');
                break;
                }
                $query->execute([$universe]);
                            return $query->fetchAll(PDO::FETCH_OBJ); 
                }
}


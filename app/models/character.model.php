<?php

class CharacterModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db-marvel;charset=utf8', 'root', '');
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


    function getAllSortBy($params) {
        $query = $this->db->prepare("SELECT db_personajes.id 
                                        as id, personaje, raza, afiliacion, lgbt, fem, db_universos.universo 
                                        as universo 
                                        FROM db_personajes 
                                        INNER JOIN db_universos 
                                        on db_personajes.universo = db_universos.id
                                        WHERE db_personajes.universo = $params[where]
                                        ORDER BY $params[field] $params[sortBy]
                                        LIMIT $params[limit]
                                        OFFSET $params[offset]");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}


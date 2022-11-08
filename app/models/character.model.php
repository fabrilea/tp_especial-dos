<?php

class CharacterModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db-marvel;charset=utf8', 'root', '');
    }

    
    
    public function getAll() {

        
        $query = $this->db->prepare('SELECT db_personajes.id as id, imagen,personaje, raza, afiliacion, lgbt, fem, db_universos.universo as universo 
                                    FROM db_personajes 
                                    INNER JOIN db_universos on db_personajes.universo = db_universos.id');
        $query->execute();

        $characters = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $characters;
    }

    public function get($id) {
        $query = $this->db->prepare('SELECT * FROM db_personajes WHERE id = ?');
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

    function getUniverse($order = null) {

        if(!empty($order)){
            if ($order == "DESC" || $order == "desc"){
                $query = $this->db->prepare('SELECT * FROM db_personajes JOIN db_universos
                                                on db_personajes.universo = db_universos.id
                                                ORDER BY db_personajes.universo desc');
        
            }else if($order == "ASC" || $order == "asc"){
            $query = $this->db->prepare('SELECT * FROM db_personajes JOIN db_universos
                                            on db_personajes.universo = db_universos.id
                                            ORDER BY db_personajes.universo asc');
            }
                }else{
                $query = $this->db->prepare('SELECT * FROM db_personajes JOIN db_universos
                                                on db_personajes.universo = db_universos.id');
            }
            $query->execute();
            $universe = $query->fetchAll(PDO::FETCH_OBJ);
            return $universe;
        }
}


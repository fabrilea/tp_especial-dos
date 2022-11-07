<?php

class CharacterModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db-marvel;charset=utf8', 'root', '');
    }

    
    
    public function getAll() {

        
        $query = $this->db->prepare("SELECT * FROM db_personajes");
        $query->execute();

        $characters = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $characters;
    }

    public function get($id) {
        $query = $this->db->prepare("SELECT * FROM db_personajes WHERE id = ?");
        $query->execute([$id]);
        $character = $query->fetch(PDO::FETCH_OBJ);
        
        return $character;
    }



    public function insert($name, $race, $afiliation, $lgbt, $fem, $universe) {
        $query = $this->db->prepare("INSERT INTO db_personajes (personaje, raza, afiliacion, lgbt, fem, universo) 
                                    VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$name, $race, $afiliation, $lgbt, $fem, $universe, false]);

        return $this->db->lastInsertId();
    }


    
    function delete($id) {
        $query = $this->db->prepare('DELETE FROM db_personajes WHERE id = ?');
        $query->execute([$id]);
    }
}


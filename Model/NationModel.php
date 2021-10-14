<?php

class NationModel{

    private $db;


    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_selecciones_futbol;charset=utf8', 'root', '');
    }

    //trae todas las selecciones y las retorna en un objeto
    function getNations(){
        $query = $this->db->prepare( "SELECT * FROM nacionalidad");
        $query->execute();
        $nations = $query->fetchAll(PDO::FETCH_OBJ);
        return $nations;
    }

    //trae todos los jugadores de una seleccion y los retorna en un objeto
    function getNation($id){
        $query = $this->db->prepare( "SELECT * FROM jugadores JOIN nacionalidad WHERE jugadores.fk_id_nacionalidad = nacionalidad.id_nacionalidad AND jugadores.fk_id_nacionalidad = ?");
        $query->execute(array($id));
        $players = $query->fetchAll(PDO::FETCH_OBJ);
        return $players;
    }

    //creo una selecion en la BD
    function insertNation($seleccion) {
        $query = $this->db->prepare("INSERT INTO nacionalidad (nombre_seleccion) VALUES(?)");
        $query->execute(array($seleccion));
    }


    //ELIMINA UNA SELECCION DE LA TABLA DE NACIONALIDAD Y TODOS LOS JUGADORES QUE PERTENECEN A ESA SELECCION DE LA OTRA TABLA
    function deleteNationFromDB($id) {
        $query = $this->db->prepare("DELETE FROM nacionalidad WHERE id_nacionalidad=?");
        $query->execute(array($id));
        $query2 = $this->db->prepare("DELETE FROM jugadores WHERE fk_id_nacionalidad=?");
        $query2->execute(array($id));
    }
    //modifica el nombre de la seleccion de la BD
    function modifyNationFromDB($id, $nombreSeleccion) {
        $query = $this->db->prepare("UPDATE nacionalidad SET nombre_seleccion = ? WHERE id_nacionalidad = ?");
        $query->execute(array($nombreSeleccion, $id));

    }

}    
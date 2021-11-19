<?php

class UserModel{

    private $db;


    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_selecciones_futbol;charset=utf8', 'root', '');
    }

    function getUsers(){
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_OBJ);
        return $users;
        
    }

    function removeAdmin($userEmail){
        $query = $this->db->prepare("UPDATE users SET admin = ? WHERE email = ?");
        $query->execute(array(true, $userEmail));
    }

    function addAdmin($userEmail){
        $query = $this->db->prepare("UPDATE users SET admin = ? WHERE email = ?");
        $query->execute(array(false, $userEmail));
    }

    function deleteUser($email) {
        $query = $this->db->prepare("DELETE FROM users WHERE email=?");
        $query->execute(array($email));

    }

}
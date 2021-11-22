<?php

class CommentsModel{

    private $db;


    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_selecciones_futbol;charset=utf8', 'root', '');
    }
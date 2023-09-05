<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . FOLDER . '/database/Database.php';

class ProfessorModel {
    public string $nome;
    public int $idade;
    private $database;

    public function salvarModel(string $nome, int $idade){
        $sql = "INSERT into professores (nome, idade) values ('$nome', '$idade')";
        $this->database->insert($sql);
    }

    public function __construct(){
        $this->database = new Database();
    }




    public function listar(){

        $dadosArray = $this->database->executeSelect("SELECT * FROM professores");

        return $dadosArray;
    }

}
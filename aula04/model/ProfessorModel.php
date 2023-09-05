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

    public function buscarPeloId(int $id){
        $professorArray = $this->database->executeSelect("SELECT * FROM professores WHERE id = '$id'");
        return $professorArray[0];
    }

    public function atualizarModel(int $id, string $nome, int $idade){
        $sql = "UPDATE professores set nome='$nome', idade='$idade' WHERE id = '$id'";
        $this->database->insert($sql);
    }

    public function excluirModel(int $id){
        $sql = "DELETE professores FROM professores WHERE id = '$id'";
        $this->database->insert($sql);
    }
}
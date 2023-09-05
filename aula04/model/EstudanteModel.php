<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . FOLDER . '/database/Database.php';

class EstudanteModel {
    public string $nome;
    public int $idade;
    private $database;

    public function salvarModel(string $nome, int $idade){
        $sql = "INSERT into estudantes (nome, idade) values ('$nome', '$idade')";
        $this->database->insert($sql);
    }

    public function __construct(){
        $this->database = new Database();
    }




    public function listar(){

        $dadosArray = $this->database->executeSelect("SELECT * FROM estudantes");

        return $dadosArray;
    }

    public function buscarPeloId(int $id){
        $estudanteArray = $this->database->executeSelect("SELECT * FROM estudantes WHERE id = '$id'");
        return $estudanteArray[0];
    }

    public function atualizarModel(int $id, string $nome, int $idade){
        $sql = "UPDATE estudantes set nome='$nome', idade='$idade' WHERE id = '$id'";
        $this->database->insert($sql);
    }

    public function excluirModel(int $id){
        $sql = "DELETE estudantes FROM estudantes WHERE id = '$id'";
        $this->database->insert($sql);
    }

}
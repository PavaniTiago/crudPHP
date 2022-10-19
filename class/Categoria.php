<?php

include_once 'Conectar.php';

class Categoria {

    private $id;
    private $descricao;
    private $con;
    private $ramal;
    
    function getRamal() {
        return $this->ramal;
    }

    function setRamal($ramal) {
        $this->ramal = $ramal;
    }

    function getId() {
        return $this->id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function consultar() {
        try {
            //estabelece conexão com bd
            $this->con = new Conectar();
            //monta a string sql
            $sql = "SELECT * FROM categoria";
            //faz a ligação entre a conexão com a string sql
            $ligacao = $this->con->prepare($sql);
            /*
             * faz um if ternário que verifica se a consulta foi executada == 1
             * se sim, retorna todos os registros da tabela fetchAll()
             * se não, retorna false
             */            
            return $ligacao->execute() == 1 ? $ligacao->fetchAll() : FALSE;
        } catch (PDOException $exc) {
            echo "Erro de bd " . $exc->getMessage();
        }
    }
    function salvar() {
        try {
            $this->con = new Conectar();
            $sql = "INSERT INTO categoria VALUES (null, ?, ?)";
            $ligacao = $this->con->prepare($sql);
            $ligacao->bindValue(1,$this->descricao);
            $ligacao->bindValue(2,$this->ramal);
            
            return $ligacao->execute() == 1 ? True : FALSE;
        } catch (PDOException $exc) {
            echo "Erro de bd " . $exc->getMessage();
        }
    }

    function excluir() {
        try {
            $this->con = new Conectar();
            $sql = "DELETE FROM categoria WHERE id = ?";
            $ligacao = $this->con->prepare($sql);
            $ligacao->bindValue(1,$this->id);
            
            return $ligacao->execute() == 1 ? TRUE : FALSE;
        } catch (PDOException $exc) {
            echo "Erro de bd " . $exc->getMessage();
        }
    }
}

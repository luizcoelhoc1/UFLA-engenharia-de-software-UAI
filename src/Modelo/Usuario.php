<?php

/**
 * TODO Auto-generated comment.
 */
class Usuario {

    function __construct($id, $cpf, $email, $nome, $senha = null) {
        $this->id = $id;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->nome = $nome;
        $this->senha = $senha;
    }

    /**
     * TODO Auto-generated comment.
     */
    private $id;

    /**
     * TODO Auto-generated comment.
     */
    private $cpf;

    /**
     * TODO Auto-generated comment.
     */
    private $email;

    /**
     * TODO Auto-generated comment.
     */
    private $nome;

    /**
     * TODO Auto-generated comment.
     */
    private $senha;

    /**
     * TODO Auto-generated comment.
     */
   
    function setId($id) {
        $this->id = $id;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

        
    function getId() {
        return $this->id;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
    }

    function getNome() {
        return $this->nome;
    }

    function getSenha() {
        return $this->senha;
    }



}

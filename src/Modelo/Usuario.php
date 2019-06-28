<?php

/**
 * Classe modelo referente ao Usuario
 *  */
class Usuario {
    
    //atributos
    private $id;
    private $cpf;
    private $email;
    private $nome;
    private $senha;

    /**
    * Construtor apenas seta os valores dos atributos com os valores passado
    */
    function __construct($id, $cpf, $email, $nome, $senha = null) {
        $this->id = $id;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->nome = $nome;
        $this->senha = $senha;
    }
    

    /***
     * Muda o id do objeto Usuário em questão
     */
    function setId($id) {
        $this->id = $id;
    }
    
    /***
     * Muda o CPF do objeto Usuário em questão
     */
    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

     /***
     * Muda o Email do objeto Usuário em questão
     */
    function setEmail($email) {
        $this->email = $email;
    }
    
     /***
     * Muda o Nome do objeto Usuário em questão
     */
    function setNome($nome) {
        $this->nome = $nome;
    }
    
    /***
     * Muda a Senha do objeto Usuário em questão
     */
    function setSenha($senha) {
        $this->senha = $senha;
    }

    /***
    * Retorna o id do Usuário
    */
    function getId() {
        return $this->id;
    }
    
    /***
    * Retorna o CPF do Usuário
    */
    function getCpf() {
        return $this->cpf;
    }
    
    /***
    * Retorna o email do Usuário
    */
    function getEmail() {
        return $this->email;
    }
    
    /***
    * Retorna o nome do Usuário
    */
    function getNome() {
        return $this->nome;
    }
    
    /***
    * Retorna a senha do Usuário
    */
    function getSenha() {
        return $this->senha;
    }

}

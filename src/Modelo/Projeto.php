<?php

/**
 * Classe modelo referente ao Projeto
 *  */
class Projeto {

    private $id;
    private $nome;
    private $fonte;
    private $autor;
    private $sinopse;
    private $generos;
    private $fundo;
    private $dataDeCriacao;

    //Definição dos gets
    function getId() {
        return $this->id;
    }
    function getNome() {
        return $this->nome;
    }
    function getFonte() {
        return $this->fonte;
    }
    function getAutor() {
        return $this->autor;
    }
    function getSinopse() {
        return $this->sinopse;
    }
    function getGeneros() {
        return $this->generos;
    }
    function getFundo() {
        return $this->fundo;
    }
    function getDataDeCriacao() {
        return $this->dataDeCriacao;
    }
    
    //Definição dos sets
    function setId($id) {
        $this->id = $id;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }
    function setFonte($fonte) {
        $this->fonte = $fonte;
    }
    function setAutor($autor) {
        $this->autor = $autor;
    }
    function setSinopse($sinopse) {
        $this->sinopse = $sinopse;
    }
    function setGeneros($generos) {
        $this->generos = $generos;
    }
    function setFundo($fundo) {
        $this->fundo = $fundo;
    }
    function setDataDeCriacao($dataDeCriacao) {
        $this->dataDeCriacao = $dataDeCriacao;
    }

    public function apoiar($quantia) {
        throw new Exception("Metodo ainda não implementado");
    }

    /**
     * Função para criação de uma instancia de Projeto via variável Post
     *      */
    static public function newByPost() {
        $projeto = new Projeto();
        foreach ($_POST as $chave => $valor) {
            if (method_exists($projeto, ($metodo = "set" . ucfirst($chave)))) {
                $projeto->$metodo($valor);
            }
        }
        return $projeto;
    }

}

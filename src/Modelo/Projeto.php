<?php
/**
 * TODO Auto-generated comment.
 */
class Projeto {

	private $id;
	private $nome;
	private $fonte;
	private $autor;
	private $sinopse;
	private $genero;
	private $fundo;

	/**
	 * TODO Auto-generated comment.
	 */
	public function getId() {
		return 0;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getNome() {
		return "";
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getFonte() {
		return "";
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getAutor() {
		return "";
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getSinopse() {
		return "";
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getGenero() {
		return "";
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function set($nome) {
		return "";
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setFonte($fonte) {
		return "";
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setAutor($autor) {
		return "";
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setSinopse($sinopse) {
		return "";
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setGenero($genero) {
		return "";
	}
	
	/** 
	* TODO, adicionei isso aqui depois
	*/
	public function apoiar($quantia) {
		if ($quantia <= 0) {
			return False;
		} else return True;
	}
}

<?php


/**
 * TODO Auto-generated comment.
 */
class Controle {
    public $usuario;
    public $projeto;

    public function __construct() {
      $this->usuario = new ControleUsuario();
      $this->projeto = new ControleProjeto();
    }

}

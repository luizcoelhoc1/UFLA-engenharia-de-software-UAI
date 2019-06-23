<?php
/**
 * TODO Auto-generated comment.
 */
class Administrador extends Usuario {
  function __construct($cpf, $email, $nome, $senha, $id = null) {
      parent::__construct($id, $cpf, $email, $nome, $senha);
  }
}

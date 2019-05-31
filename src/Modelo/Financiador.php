<?php

/**
 * TODO Auto-generated comment.
 */
class Financiador extends Usuario {
    function __construct($cpf, $email, $nome, $senha, $carteira = 0, $id = null) {
        parent::__construct($id, $cpf, $email, $nome, $senha);
        $this->carteira = $carteira;
    }

    /**
     * TODO Auto-generated comment.
     */
    private $carteira;

    /**
     * TODO Auto-generated comment.
     */
    public function adicionarDinheiro($quantidade) {
        return false;
    }

}

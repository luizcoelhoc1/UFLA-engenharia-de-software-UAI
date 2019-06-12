<?php

class Financiador extends Usuario {

    function __construct($cpf, $email, $nome, $senha, $carteira = 0, $id = null) {
        parent::__construct($id, $cpf, $email, $nome, $senha);
        $this->carteira = $carteira;
    }

    /***
    * Carteira virtual do financiador
    */
    private $carteira;

    /**
     * TODO Auto-generated comment.
     */
    public function adicionarDinheiro($quantidade) {
        return false;
    }

    /***
    * Retorna o valor da carteira virtual do financiador
    */
    function getCarteira() {
        return $this->carteira;
    }


}

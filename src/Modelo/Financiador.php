<?php

/**
 * Classe modelo referente ao Financiador
 *  */
class Financiador extends Usuario {

    function __construct($cpf, $email, $nome, $senha, $carteira = 0, $id = null) {
        parent::__construct($id, $cpf, $email, $nome, $senha);
        $this->carteira = $carteira;
    }

    /***
    * Carteira virtual do financiador
    */
    private $carteira;

    
    public function adicionarDinheiro($quantidade) {
        throw new Exception("Metodo Ainda não implementado");
    }

    /***
    * Retorna o valor da carteira virtual do financiador
    */
    function getCarteira() {
        return $this->carteira;
    }


}

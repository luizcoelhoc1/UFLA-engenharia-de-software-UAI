<?php

class Navegacao {

    /**
     * TODO Auto-generated comment.
     */
    public function navegacaoAnonimo() {
        return "";
    }

    /**
     * Retorna string contendo HTML do navbar que o financiador verá
     */
    static public function navegacaoFinanciador($financiador) {
        $navegacao = new Template(__DIR__ . "/html/navegacao/financiador.html");
        $navegacao->set("carteira", $financiador->getCarteira());
        $navegacao->set("nome", $financiador->getNome());
        return $navegacao->output();
    }

    /**
     * TODO Auto-generated comment.
     */
    public function navegacaoAdministrador($administrador) {
        return "";
    }

    /**
     * TODO Auto-generated comment.
     */
    public function navegacaoFuncionario($funcionario) {
        return "";
    }

}

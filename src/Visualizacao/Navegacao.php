<?php

class Navegacao {

    /**
     * Retorna string contendo HTML do navbar que um usuário sem ter feito login verá
     */
    public function navegacaoAnonimo() {
        $navegacao = new Template(__DIR__ . "/html/navegacao/anonimo.html");
        return $navegacao->output();
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
     * Retorna string contendo HTML do navbar que o administrador verá
     */
    public function navegacaoAdministrador($administrador) {
        $navegacao = new Template(__DIR__ . "/html/navegacao/administrador.html");
        $navegacao->set("nome", $administrador->getNome());
        return $navegacao->output();
    }

    /**
     * Retorna string contendo HTML do navbar que o funcionario verá
     */
    public function navegacaoFuncionario($funcionario) {
        $navegacao = new Template(__DIR__ . "/html/navegacao/administrador.html");
        $navegacao->set("nome", $funcionario->getNome());
        return $navegacao->output();
    }
    
}

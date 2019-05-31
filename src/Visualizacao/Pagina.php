<?php

/**
 * TODO Auto-generated comment.
 */
class Pagina {

    private $controle;

    public function __construct() {
        $this->controle = new Controle();
    }

    /**
     * TODO Auto-generated comment.
     */
    public function projeto($tipoPagina) {
        
    }

    /**
     * TODO Auto-generated comment.
     */
    public function login() {
        $pagina = new Template(__DIR__ . "/html/login/login.html");
        if (isset($_POST["email"]) && $_POST["senha"]) {
            $estaLogado = $this->controle->usuario->realizarLogin($_POST["email"], $_POST["senha"]);
            if ($estaLogado) {
                return $this->projeto($this->controle->usuario->getTipoUsuario($_COOKIE["uaiid"]));
            } else {
                $pagina->set("erro", "block");
                $pagina->set("email", $_POST["email"]);
                $pagina->set("senha", $_POST["senha"]);
            }
        } else {
            $pagina->set("erro", "none");
            $pagina->set("email", "");
            $pagina->set("senha", "");
        }
        return $pagina->output();
    }

    /**
     * TODO Auto-generated comment.
     */
    public function cadastrarSe() {

        if (isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["email"]) && isset($_POST["senha"])) {
            $pagina = new Template(__DIR__ . "/html/login/cadastrarSe.html");
            if ($this->controle->usuario->novoFinanciador($_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST["senha"])) {
                echo "novo usuario feito";
            } else {
                $pagina = new Template(__DIR__ . "/html/login/cadastrarSe.html");
                foreach ($_POST as $key => $value) {
                    $pagina->set($key, $value);
                }
                $pagina->set("erroMsg", "Cpf ou email j&aacute; existentes");
            }
        } else {
            $pagina = new Template(__DIR__ . "/html/login/cadastrarSe.html");
            $pagina->set("nome", "");
            $pagina->set("email", "");
            $pagina->set("senha", "");
            $pagina->set("cpf", "");
            $pagina->set("erroMsg", "");
        }
        return $pagina->output();
    }

    /**
     * TODO Auto-generated comment.
     */
    public function adicionarDinheiroCarteira() {
        return "";
    }

    /**
     * TODO Auto-generated comment.
     */
    public function criarContas() {
        return "";
    }

    /**
     * TODO Auto-generated comment.
     */
    public function criarProjeto() {
        return "";
    }

    /**
     * TODO Auto-generated comment.
     */
    public function designarFuncionario() {
        return "";
    }

    /**
     * TODO Auto-generated comment.
     */
    public function editarDadosPessoais() {
        return "aa";
    }

}

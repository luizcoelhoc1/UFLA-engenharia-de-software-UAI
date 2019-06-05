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

    
    public function navegacao() {
        $navegacao = new Template(__DIR__ . "/html/navegacao/navegacao.html");
        
        if (isset($_COOKIE["uaiid"])) {
            $tipo = $this->controle->usuario->getTipoUsuario($_COOKIE["uaiid"]);
            if ($tipo == "financiador") {
                $financiador = $this->controle->usuario->getFinanciador($_COOKIE["uaiid"]);
                $navegacao->set("navegacaoEspecifica", Navegacao::navegacaoFinanciador($financiador));
            } else if ($tipo == "administrador") {
                
            } else {
                
            }
        } else {
            
        }
        return $navegacao->output();
    }
    
    
    public function editarDadosPessoais() {
        if (isset($_COOKIE["uaiid"])) {
            if (isSetPost(["nome", "cpf", "email"]) || isset($_POST["senha"])) {
                echo "<pre>";
                print_r($_POST);
                echo "</pre>";
            }
            
            $pagina = new Template(__DIR__ . "/html/telasComuns/perfil.html");
            $pagina->set("navegacao", $this->navegacao());
            $usuario = $this->controle->usuario->getUsuario($_COOKIE["uaiid"]);
            $pagina->set("cpf", $usuario->getCpf());
            $pagina->set("nome", $usuario->getNome());
            $pagina->set("email", $usuario->getEmail());
            $pagina->set("email", $usuario->getEmail());
            $pagina->set("titulo", "Editar dados pessoais");
        } else {
            return $this->login();
        }
        echo $pagina->output();
    }

}

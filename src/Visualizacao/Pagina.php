<?php

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

    /***
     * Retorna a página de login e caso o usuário mande um POST é feito o login e retornado a pagina inicial
     */
    public function login() {
        
        $pagina = new Template(__DIR__ . "/html/login/login.html");
        
        //Caso exista post
        if (isset($_POST["email"]) && $_POST["senha"]) {
            $estaLogado = $this->controle->usuario->realizarLogin($_POST["email"], $_POST["senha"]);
            //Login realizado
            if ($estaLogado) {
                echo $this->controle->usuario->getTipoUsuario($_COOKIE["uaiid"]);
                return $this->projeto();
            } else {
            // Login errado
                $pagina->set("erro", "block");
                $pagina->set("email", $_POST["email"]);
                $pagina->set("senha", $_POST["senha"]);
            }
        } else {
        //Caso não exista
            $pagina->set("erro", "none");
            $pagina->set("email", "");
            $pagina->set("senha", "");
        }
        
        return $pagina->output();
    }

    /***
     * Retorna a página de cadastrar-se ou cadastra um novo financiador verificando se existe POST ou não
     */
    public function cadastrarSe() {
        //Caso exista post (usuário clicou no botão de cadastrar-se)
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
        //Caso tenha acabado de clicar na página de cadastrar-se
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

    /***
    * Monta a navegação da pagina baseado no cookie uaiid
    */
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

    
    /***
    * Retorna a página de edição de dados pessoais e realiza as mudanças dependendo se existe ou não POST
    */
    public function editarDadosPessoais() {
        if (isset($_COOKIE["uaiid"])) {
            $pagina = new Template(__DIR__ . "/html/telasComuns/perfil.html");
            if (isSetPost(["nome", "cpf", "email"]) || isset($_POST["senha"])) {
                $usuario = new Usuario($_COOKIE["uaiid"], $_POST["cpf"], $_POST["email"], $_POST["nome"], $_POST["senha"]);
                $this->controle->usuario->setUsuario($usuario);
            }

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

    /***
    * Deleta uma conta e retorna a página inicial no modo anonimo
    */
    public function deletarConta() {
        $this->controle->usuario->deletarConta($_COOKIE["uaiid"]);
        return $this->projeto("anonimo");
    }

    /***
    * Desloga e retorna a página inicial no modo anonimo
    */
    public function deslogar() {
        $this->controle->usuario->deslogar();
        return $this->projeto("anonimo");
    }

}

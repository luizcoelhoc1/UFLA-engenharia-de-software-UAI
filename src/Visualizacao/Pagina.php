<?php

class Pagina {

    private $controle;
    private $atributosProjeto;

    public function __construct() {
        $this->controle = new Controle();
        $this->atributosProjeto = ["nome", "generos", "autor", "fonte", "sinopse"];
    }

    public function homePage() {
        return $this->projeto();
    }

    /**
     * TODO Auto-generated comment.
     */
    public function projeto() {
        $pagina = new Template(__DIR__ . "/html/projeto/index.html");

        //get tipo da pagina
        if (isset($_COOKIE["uaiid"])) {
            $tipoPagina = $this->controle->usuario->getTipoUsuario($_COOKIE["uaiid"]);
        } else {
            $tipoPagina = "anonimo";
        }
        $tipoPagina = ucfirst($tipoPagina);

        // Navegação
        $pagina->set("navegacao", $this->navegacao($tipoPagina));

        // Mensagem
        if (Mensagem::exists()) {
            $mensagem = new Template(__DIR__ . "/html/mensagem.html");
            $mensagem->set("type", (Mensagem::type() == Mensagem::SUCCESSS) ? "success" : "danger");
            $mensagem->set("msg", Mensagem::msg());
            $pagina->set("msg", $mensagem->output());
        } else {
            $pagina->set("msg", "");
        }

        // projetos
        $projetos = $this->controle->projeto->getProjetos();
        if (count($projetos) == 0) {
            $semProjetos = new Template(__DIR__ . "/html/projeto/semProjetos.html");
            $pagina->set("projetos", $semProjetos->output());
        } else {
            $projetosHTML = "";
            foreach ($projetos as $projeto) {
                $projetoTemplate = new Template(__DIR__ . "/html/projeto/projeto$tipoPagina.html");
                foreach ($projeto as $key => $value)
                    $projetoTemplate->set($key, $value);
                $projetosHTML .= $projetoTemplate->output();
            }
            $pagina->set("projetos", $projetosHTML);
        }

        // JavaScript para o ADM
        $pagina->set("scriptADM", ($tipoPagina == "Administrador") ? '<script src="Visualizacao/javascript/adm.js"></script>' : "");

        return $pagina->output();
    }

    public function excluirProjeto() {
        if (!isset($_GET["id"])) {
            throw new Exception("Nenhum Id de projeto foi passado para ser excluido");
        }
        $excluiu = $this->controle->projeto->excluirProjeto($_GET["id"]);
        if (!$excluiu) {
            throw new Exception("Não foi possível excluir nenhum projeto!");
        }

        Mensagem::set("Projeto excluido com sucesso", Mensagem::SUCCESSS);
        return $this->homePage();
    }

    /*     * *
     * Retorna a página de login e caso o usuário mande um POST é feito o login e retornado a pagina inicial
     */

    public function login() {
        $pagina = new Template(__DIR__ . "/html/login/login.html");

        //Caso exista post
        if (isset($_POST["email"]) && $_POST["senha"]) {
            $estaLogado = $this->controle->usuario->realizarLogin($_POST["email"], $_POST["senha"]);
            //Login realizado
            if ($estaLogado) {
                $tipo = $this->controle->usuario->getTipoUsuario($_COOKIE["uaiid"]);
                return $this->projeto($tipo);
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

    /*     * *
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

    
    public function devolucao() {
        
        
    }
    
    public function doar() {
        if (isSetPost(["doacao", "idProjeto"])) {
            $doado = $this->controle->projeto->doar($_POST["idProjeto"], $_COOKIE["uaiid"], $_POST["doacao"]);
            if ($doado) {
                Mensagem::set("Sua doação foi concluida", Mensagem::SUCCESSS);
            } else {
                Mensagem::set("Não foi possível completar sua doação");
            }
        }
        return $this->homePage();
    }

    /**
     * TODO Auto-generated comment.
     */
    public function adicionarDinheiroCarteira() {
        $pagina = new Template(__DIR__ . "/html/carteira/index.html");
        if (isset($_POST["carteira"])) {
            $adicionado = $this->controle->usuario->adicionarDinheiroCarteira($_COOKIE["uaiid"], $_POST["carteira"]);
            if ($adicionado) {
                Mensagem::set("Adicionado com sucesso", Mensagem::SUCCESSS);
                return $this->homePage();
            } else {
                $pagina->set("msg", "Não foi possível adicionar");
            }
        }
        $pagina->set("navegacao", $this->navegacao());
        $financiador = $this->controle->usuario->getFinanciador($_COOKIE["uaiid"]);
        $pagina->set("carteira", $financiador->getCarteira());

        return $pagina->output();
    }

    /**
     * TODO Auto-generated comment.
     */
    public function criarContas() {
        
    }

    /**
     * TODO Auto-generated comment.
     */
    public function criarProjeto() {

        $pagina = new Template(__DIR__ . "/html/projeto/criarProjeto.html");


        if (isSetPost($this->atributosProjeto)) {
            $novoProjeto = Projeto::newByPost();
            $criou = $this->controle->projeto->criarProjeto($novoProjeto);
            if ($criou) {
                Mensagem::set("Inserido com sucesso o novo projeto", Mensagem::SUCCESSS);
                return $this->projeto();
            } else {
                Mensagem::set("Não foi possível criar o projeto", Mensagem::FAILURE);
                foreach ($this->atributosProjeto as $atr) {
                    $pagina->set($atr, $_POST[$atr]);
                }
            }
        } else {
            foreach ($this->atributosProjeto as $atr) {
                $pagina->set($atr, "");
            }
        }

        $pagina->set("navegacao", $this->navegacao());

        return $pagina->output();
    }

    /**
     * TODO Auto-generated comment.
     */
    public function designarFuncionario() {
        return "";
    }

    public function editarProjeto() {
        if (isSetPost($this->atributosProjeto) && isset($_POST["id"])) {
            $projeto = $this->controle->projeto->getProjeto($_POST["id"]);

            foreach ($this->atributosProjeto as $atr) {
                $set = "set" . ucfirst($atr);
                $projeto->$set($_POST[$atr]);
            }

            $editado = $this->controle->projeto->setProjeto($projeto);
            if ($editado) {
                Mensagem::set("Editado com sucesso", Mensagem::SUCCESSS);
            } else {
                Mensagem::set("Não foi possível editar!", Mensagem::FAILURE);
            }
            return $this->homePage();
        }
    }

    /*     * *
     * Monta a navegação da pagina baseado no cookie uaiid
     */

    public function navegacao($tipo = null) {
        $navegacao = new Template(__DIR__ . "/html/navegacao/navegacao.html");

        //Acha o tipo da navegação
        if ($tipo == null) {
            if (isset($_COOKIE["uaiid"])) {
                $tipo = $this->controle->usuario->getTipoUsuario($_COOKIE["uaiid"]);
            } else {
                $tipo = "anonimo";
            }
        }

        //Monta a navegação
        if (strtolower($tipo) == "anonimo") {
            $navegacao->set("navegacaoEspecifica", Navegacao::navegacaoAnonimo());
        } else {
            $get = "get" . ucfirst($tipo);
            $navegacaoTipo = "navegacao" . ucfirst($tipo);
            $usuario = $this->controle->usuario->$get($_COOKIE["uaiid"]);
            $navegacao->set("navegacaoEspecifica", Navegacao::$navegacaoTipo($usuario));
        }


        return $navegacao->output();
    }

    /*     * *
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

    /*     * *
     * Deleta uma conta e retorna a página inicial no modo anonimo
     */

    public function deletarConta() {
        $this->controle->usuario->deletarConta($_COOKIE["uaiid"]);
        return $this->projeto("anonimo");
    }

    /*     * *
     * Desloga e retorna a página inicial no modo anonimo
     */

    public function deslogar() {
        $this->controle->usuario->deslogar();
        return $this->projeto();
    }

}

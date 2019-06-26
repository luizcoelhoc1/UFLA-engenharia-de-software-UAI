<?php

/* * *
 * Imports
 */
include_once './Controle/Controle.php';
include_once './Controle/ControleProjeto.php';
include_once './Controle/ControleUsuario.php';
include_once './Controle/Mensagem.php';
include_once './Modelo/Conexao.php';
include_once './Modelo/Usuario.php';
include_once './Modelo/Administrador.php';
include_once './Modelo/Financiador.php';
include_once './Modelo/Transacao.php';
include_once './Modelo/Projeto.php';
include_once 'Visualizacao/Template.php';
include_once 'Visualizacao/Navegacao.php';
include_once 'Visualizacao/Pagina.php';

/* * *
 * Verifica se todos os posts estão setados
 */

function isSetPost($arr) {
    $retorno = true;
    foreach ($arr as $value) {
        $retorno = $retorno && isset($_POST[$value]);
    }
    return $retorno;
}

try {
    //Abre a transição com o banco de dados
    Transacao::open();

    //Cria um objeto do tipo página
    $pagina = new Pagina();

    //pagina default
    if (!isset($_GET["a"])) {
        $_GET["a"] = "projeto";
    }

    //chama a função da pagina que o usuário clicou
    $func = $_GET["a"];
    echo $pagina->$func();

    //Fecha
    Transacao::close();
} catch (Exception $e) {
    $pagina = new Pagina();
    Mensagem::set($e->getMessage(), Mensagem::FAILURE);
    echo $pagina->homePage();
    Transacao::rollback();
}
?>

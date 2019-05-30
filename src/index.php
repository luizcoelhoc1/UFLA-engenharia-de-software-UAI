<?php
include_once './Controle/Controle.php';
include_once './Controle/ControleUsuario.php';
include_once './Modelo/Conexao.php';
include_once './Modelo/Transacao.php';
include_once 'Visualizacao/Template.php';
include_once 'Visualizacao/Pagina.php';

Transacao::open();

$pagina = new Pagina();


$func = $_GET["a"];
echo $pagina->$func();

Transacao::close();

?>
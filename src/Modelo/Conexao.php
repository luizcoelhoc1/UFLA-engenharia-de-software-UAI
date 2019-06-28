<?php

/**
 * Classe para fazer a conexao com o banco de dados
 *  */
class Conexao {
    
    /**
     * Metodo único para conectar com o banco de dados
     *      */
    public static function open($host, $porta, $bancoDeDados, $usuario, $senha) {
        //Conecta com o banco
        $con = new PDO("mysql:host={$host};port={$porta};dbname={$bancoDeDados}", $usuario, $senha);

        //Seta parametros
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->Query("SET NAMES utf8");

        return $con;
    }

}

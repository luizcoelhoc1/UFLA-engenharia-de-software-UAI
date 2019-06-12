<?php

class Conexao {

    public static function open($host, $porta, $bancoDeDados, $usuario, $senha) {
        //conecta com o banco
        $con = new PDO("mysql:host={$host};port={$porta};dbname={$bancoDeDados}", $usuario, $senha);

        //seta parametros
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->Query("SET NAMES utf8");

        return $con;
    }

}

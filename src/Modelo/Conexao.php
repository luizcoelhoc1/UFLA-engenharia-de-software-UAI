<?php

/**
 * TODO Auto-generated comment.
 */
class Conexao {

    /**
     * TODO Auto-generated comment.
     */
    public static function open($host, $porta, $bancoDeDados, $usuario, $senha) {
        $con = new PDO("mysql:host={$host};port={$porta};dbname={$bancoDeDados}", $usuario, $senha);

        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->Query("SET NAMES utf8");

        return $con;



        return null;
    }

}

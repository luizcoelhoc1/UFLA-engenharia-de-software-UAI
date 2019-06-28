<?php

/**
 * Classe utilizada como um tipo de console único, utilizando o padrão de projeto singleton
 *
 * @author luizc
 */
class Mensagem {
    
    // Array com as infomrações da mensagem
    private static $msg;

    // Constantes de tipo
    const SUCCESSS = 1;
    const FAILURE = 0;

    // Escreve na mensagem
    public static function set($msg = null, $type = null) {
        self::$msg["msg"] = $msg;
        self::$msg["type"] = $type;
    }

    // Retorna todos os dados da msg
    public static function get() {
        return self::$msg;
    }

    // Retorna a descrição da msg
    public static function msg() {
        return self::$msg["msg"];
    }

    // Retorna o tipo da mensagem
    public static function type() {
        return self::$msg["type"];
    }

    // Retorna se uma mensagem já foi escrita
    public static function exists() {
        return self::$msg != null;
    }

}

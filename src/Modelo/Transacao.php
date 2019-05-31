<?php

/**
 * TODO Auto-generated comment.
 */
class Transacao {

    /**
     * TODO Auto-generated comment.
     */
    private static $conexao;

    /**
     * TODO Auto-generated comment.
     */
    public static function open() {
        if (empty(self::$conexao)) {
            self::$conexao = Conexao::open("localhost", "3306", "uai", "uai", "123");
            self::$conexao->beginTransaction();
        }
    }

    /**
     * TODO Auto-generated comment.
     */
    public static function get() {
        return self::$conexao;
    }

    /**
     * TODO Auto-generated comment.
     */
    public static function close() {
        if (self::$conexao) {
            self::$conexao->commit();
            self::$conexao = NULL;
        }
    }

    /**
     * TODO Auto-generated comment.
     */
    public static function rollback() {
        if (self::$conexao) {
            self::$conexao->rollback();
            self::$conexao = NULL;
        }
    }

    /**
     * TODO Auto-generated comment.
     */
    public static function ultimoIdInserido() {
        return self::$conexao->lastInsertId();
    }

    public function exists($table, $column, $value) {
        $resultado = self::$conexao->query("select * from $table where $column = '$value'");
        return ($resultado->rowCount() == true);
    }

}

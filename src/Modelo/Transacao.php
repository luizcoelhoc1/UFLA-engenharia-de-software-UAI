<?php

/***
* Classse responsável pela transação do banco de dados
*/
class Transacao {

    /***
     * Objeto único de conexão durante toda uma transação e do programa
     */
    private static $conexao;

    /***
     * Abre uma transação
     */
    public static function open() {
        if (empty(self::$conexao)) {
            self::$conexao = Conexao::open("localhost", "3306", "uai", "uai", "123");
            self::$conexao->beginTransaction();
        }
    }

    /***
     * Retorna o objeto conexão para ser realizado a ação de querys 
     */
    public static function get() {
        return self::$conexao;
    }

    /***
     * Da commmit na transação e fecha a conexão
     */
    public static function close() {
        if (self::$conexao) {
            self::$conexao->commit();
            self::$conexao = NULL;
        }
    }

    /**
     * Da rollback na transação e fecha a conexão
     */
    public static function rollback() {
        if (self::$conexao) {
            self::$conexao->rollback();
            self::$conexao = NULL;
        }
    }

    /***
     * Pega o ultimo id inserido da transação
     */
    public static function ultimoIdInserido() {
        return self::$conexao->lastInsertId();
    }

    /***
    * Verifica se um determinado valor existe em uma determinada tabela passados por parâmentro
    */
    public function exists($table, $column, $value) {
        $resultado = self::$conexao->query("select * from $table where $column = '$value'");
        return ($resultado->rowCount() == true);
    }

}

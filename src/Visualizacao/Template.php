<?php

/**
 * TODO Auto-generated comment.
 */
class Template {

    /**
     * TODO Auto-generated comment.
     */
    private $valores;

    /**
     * TODO Auto-generated comment.
     */
    private $arquivo;

    /**
     * TODO Auto-generated comment.
     */
    public static $comecoChave = "[@";

    /**
     * TODO Auto-generated comment.
     */
    public static $fimChave = "]";

    /**
     * TODO Auto-generated comment.
     */
    public function __construct($arquivo, $chave = null) {
        $valores = array();

        if (file_exists($arquivo)) {
            $this->arquivo = file_get_contents($arquivo);
        } else {
            $this->arquivo = $arquivo;
        }
        if ($chave != null) {
            $this->valores = $chave;
        }
    }

    public function set($chave, $valor) {
        $this->valores[$chave] = $valor;
    }

    /**
     * TODO Auto-generated comment.
     */
    public function output() {
        if (!empty($this->valores)) {
            foreach ($this->valores as $chave => $valor) {
                $tagToValor = self::$comecoChave . $chave . self::$fimChave;
                $this->arquivo = str_replace($tagToValor, $valor, $this->arquivo);
            }
        }
        return $this->arquivo;
    }

}

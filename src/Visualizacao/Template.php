<?php

class Template {

    /***
     * Valores cuja chave será a chave de mudança do template e o valor o valor q será substituido
     */
    private $valores;

    /***
     * O arquivo do template
     */
    private $arquivo;

    /***
     * Como será identificado o começo chave
     */
    public static $comecoChave = "[@";

    /***
     * Como será identificado o final chave
     */
    public static $fimChave = "]";

    
    /***
     * Construtor tenta verificar se o arquivo passado é um endereço de um arquivo, se for lê o arquivo e o trata como o template, caso contrário trata a string passada por parametro como o template
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

    /***
    * Seta uma chave do template com um valor
    */
    public function set($chave, $valor) {
        $this->valores[$chave] = $valor;
    }

    /***
     * Retorna o template montado
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

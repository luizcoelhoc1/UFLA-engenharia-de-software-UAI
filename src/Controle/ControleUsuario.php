<?php

/**
 * TODO Auto-generated comment.
 */
class ControleUsuario {

    public function realizarLogin($email, $senha) {
        $conexao = Transacao::get();
        $resultado = $conexao->query("select id from usuario where email = '$email' and senha = '$senha'");
        if (!$resultado->rowCount()) {
            return false;
        } else {
            setcookie("uaiid", $resultado->fetchObject()->id);
            return true;
        }
    }

    private function isTipoUsuario($tipo, $id) {
        $conexao = Transacao::get();
        $resultado = $conexao->query("select idUsuario from $tipo where idUsuario = '$id'");
        if (!$resultado->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function getTipoUsuario($id) {
        echo '<pre>';
        $tipos = array("financiador", "administrador", "funcio0nario");
        foreach ($tipos as $tipo) {
            if ($this->isTipoUsuario($tipo, $id)) {
                return $tipo;
            }
        }
        return "non";
    }

    public function novoFinanciador() {
        
    }

    /**
     * TODO Auto-generated comment.
     */
    public function setUsuario($usuario) {
        return false;
    }

    /**
     * TODO Auto-generated comment.
     */
    public function getAdministrador($id) {
        return null;
    }

    /**
     * TODO Auto-generated comment.
     */
    public function getFinanciador($id) {
        return null;
    }

    /**
     * TODO Auto-generated comment.
     */
    public function getFuncionarios() {
        return null;
    }

}

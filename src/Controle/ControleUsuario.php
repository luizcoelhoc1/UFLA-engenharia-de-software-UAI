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
        $tipos = array("financiador", "administrador", "funcio0nario");
        foreach ($tipos as $tipo) {
            if ($this->isTipoUsuario($tipo, $id)) {
                return $tipo;
            }
        }
        return null;
    }

    public function novoFinanciador($nome, $cpf, $email, $senha) {
        $conexao = Transacao::get();
        if (Transacao::exists("usuario", "cpf", $cpf) || Transacao::exists("usuario", "email", $email)) {
            return false;
        }
        $conexao->query("INSERT INTO `usuario`(`nome`, `cpf`, `email`, `senha`) VALUES ('$nome', '$cpf', '$email', '$senha')");
        $idUsuario = Transacao::ultimoIdInserido();
        $conexao->query("INSERT INTO `financiador`(`idUsuario`, `carteira`) VALUES ('$idUsuario', 0)");
        
        return $this->realizarLogin($email, $senha);
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
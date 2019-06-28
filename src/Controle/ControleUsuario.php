<?php

class ControleUsuario {
    /*     * *
     * Seta cookie do login se existir conta
     */
    public function realizarLogin($email, $senha) {
        $conexao = Transacao::get();
        $resultado = $conexao->query("select id from usuario where email = '$email' and senha = '$senha'");
        if (!$resultado->rowCount()) {
            return false;
        } else {
            ob_start();
            $usuario = $resultado->fetchObject();
            setcookie("uaiid", $usuario->id);
            $_COOKIE["uaiid"] = $usuario->id;
            ob_end_flush();
            return true;
        }
    }

    /*     * *
     * Adicina à carteira de um financiador dado seu id por parametro, uma quantidade de dinheiro 
     * */
    public function adicionarDinheiroCarteira($id, $quantidade) {
        $conexao = Transacao::get();

        // Persiste
        $resultado = $conexao->query($sql = "UPDATE financiador set carteira = carteira+$quantidade where idUsuario = $id");
        if ($resultado->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    /*     * *
     * Função auxiliar do get tipo usuário para verificar o tipo de usuário
     */
    private function isTipoUsuario($tipo, $id) {
        $conexao = Transacao::get();
        $resultado = $conexao->query("select idUsuario from $tipo where idUsuario = '$id'");
        if ($resultado->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    /*     * *
     * Retorna o tipo de usuário do id passado ou null caso não seja de nenhum tipo especificado
     */
    public function getTipoUsuario($id) {
        $tipos = array("financiador", "administrador", "funcionario");
        foreach ($tipos as $tipo) {
            if ($this->isTipoUsuario($tipo, $id)) {
                return $tipo;
            }
        }
        return null;
    }

    /*     * *
     * Cadastra novo funcionário e realiza login caso seja criado com sucesso
     * Retorna true para caso todos os procedimentos sejam executados com sucesso e false caso contrário
     */
    public function novoFinanciador($nome, $cpf, $email, $senha) {
        $conexao = Transacao::get();

        //verifica se as unique key já não existem
        if (Transacao::exists("usuario", "cpf", $cpf) || Transacao::exists("usuario", "email", $email)) {
            return false;
        }

        //insere o financiador
        $conexao->query("INSERT INTO `usuario`(`nome`, `cpf`, `email`, `senha`) VALUES ('$nome', '$cpf', '$email', '$senha')");
        $idUsuario = Transacao::ultimoIdInserido();
        $conexao->query("INSERT INTO `financiador`(`idUsuario`, `carteira`) VALUES ('$idUsuario', 0)");

        return $this->realizarLogin($email, $senha);
    }

    /*     * *
     * Muda dos dados do usuário passado por parâmetro e fixa no banco de dados
     */
    public function setUsuario($usuario) {
        $conexao = Transacao::get();

        //montando o where do select para verificação de email e cpf existentes
        $selectWhere = array();
        $selectWhere[] = " cpf = '" . $usuario->getCpf() . "'";
        $selectWhere[] = " email = '" . $usuario->getEmail() . "'";
        $update = $selectWhere;

        //Verifica se existe email ou cpf editados
        $selectWhere = implode(" or ", $update);
        $resultado = $conexao->query($sql = "select * from usuario where (id <> '" . $_COOKIE["uaiid"] . "') and ($selectWhere)");
        if ($resultado->rowCount()) {
            return false;
        }

        //monta o set do UPDATE
        $update[] = " nome = '" . $usuario->getNome() . "'";
        $update[] = " cpf = '" . $usuario->getCpf() . "'";
        $update[] = " email = '" . $usuario->getEmail() . "'";
        if ($usuario->getSenha() != null) {
            $update[] = " senha = '" . $usuario->getSenha() . "'";
        }

        //atualiza
        $conexao->query("UPDATE `usuario` SET " . implode(", ", $update) . " WHERE id = '" . $_COOKIE["uaiid"] . "'");

        return true;
    }

    /**
     * Retorna uma instancia de Administrador dado um ID
     */
    public function getAdministrador($id) {
        $conexao = Transacao::get();
        $resposta = $conexao->query("select * from usuario inner join administrador on usuario.id = administrador.idUsuario where usuario.id = '$id'");
        $std = $resposta->fetchObject();
        if ($std == null) {
            return null;
        }
        return new Administrador($std->cpf, $std->email, $std->nome, $std->senha, $std->id);
    }

    /**
     * Retorna um objeto Financiador com os dados do Financiador com o id do id passado por parâmetro
     */
    public function getFinanciador($id) {
        $conexao = Transacao::get();
        $resposta = $conexao->query("select * from usuario inner join financiador on usuario.id = financiador.idUsuario where usuario.id = '$id'");
        $std = $resposta->fetchObject();
        if ($std == null) {
            return null;
        }
        return new Financiador($std->cpf, $std->email, $std->nome, $std->senha, $std->carteira, $std->id);
    }

    /*     * *
     * retorna um usuário com o id passado ou null caso não exista no banco de dados
     */
    public function getUsuario($id) {
        $conexao = Transacao::get();
        $resposta = $conexao->query("select * from usuario where id = '$id'");
        $std = $resposta->fetchObject();
        // se não existe no banco de dados retorna null
        if ($std == null) {
            return null;
        }
        return new Usuario($std->id, $std->cpf, $std->email, $std->nome, $std->senha);
    }

    public function getFuncionarios() {
        throw new Exception("Metodo consultar funcionarios não implementado ainda!");
    }

    /*     * *
     * Deleta a conta do banco de dados com o id passado por parâmetro
     */
    public function deletarConta($id) {
        $conexao = Transacao::get();
        $resultado = $conexao->query("delete from usuario where id = '$id'");
        return ($resultado->rowCount() == true);
    }

    /*     * *
     * Desloga
     */
    public function deslogar() {
        unset($_COOKIE["uaiid"]);
        setcookie("uaiid", null, time() - 1);
    }

}

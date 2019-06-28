<?php

/***
 *  Controle de Projeto 
 *   */
class ControleProjeto {

    
    /***
     * Faz a doação de um financiador para um projeto se torne permanente no bd
     */
    public function doar($idProjeto, $idFinanciador, $quantidade) {
        $conexao = Transacao::get();
        
        //pega o financiador
        $resultado = $conexao->query("select * from financiador where idUsuario=$idFinanciador");
        $financiador = $resultado->fetchObject();
        
        //verifica se financiador tem disponível
        if ($financiador->carteira >= $quantidade) {
            //faz a transferencia de financiador para prjojeto
            $conexao->query("UPDATE projeto set fundo=fundo+$quantidade where id = $idProjeto");
            $conexao->query("UPDATE financiador set carteira=carteira-$quantidade where idUsuario = $idFinanciador");
           
            //verifica se é um update ou um insert e o faz
            $historicoExiste = $conexao->query("select * from historicodoacao where idProjeto = $idProjeto and idFinanciador = $idFinanciador");
            if ((boolean) $historicoExiste->rowCount() == 1) {
                $conexao->query("UPDATE `historicodoacao` "
                        . "SET `quantia`=quantia+$quantidade "
                        . "WHERE idProjeto=$idProjeto and idFinanciador=$idFinanciador");
            } else {
                $conexao->query("INSERT INTO `historicodoacao`"
                        . "(`idProjeto`, `idFinanciador`, `quantia`)"
                        . " VALUES ('$idProjeto', '$idFinanciador', $quantidade)");
            }
        } else {
            throw new Exception("Dinheiro insuficiente");
        }

        return true;
    }

    public function designarFuncionario($idFuncionario, $idProjeto) {
        throw new Exception("Metodo ainda não implementado");
    }

    
    /***
     * Exclui um projeto do banco de dados, devolvendo todas as doações dos financiadores.
     */
    public function excluirProjeto($idProjeto) {
        //pega o histórico de doações
        $conexao = Transacao::get();
        $resultado = $conexao->query("SELECT * FROM `historicodoacao` where idProjeto = $idProjeto");
        
        //para todos os históricos devolve a quantia do financiador
        $financiador = $resultado->fetchObject();
        while ($financiador != null) {
            $quantidade = $financiador->quantia;
            $idFinanciador = $financiador->idFinanciador;
            $conexao->query("UPDATE financiador set carteira=carteira+$quantidade where idUsuario = $idFinanciador");
            $financiador = $resultado->fetchObject();
        }
        
        //deleta o projeto
        $resultado = $conexao->query("DELETE FROM projeto WHERE id = $idProjeto");
        if ($resultado->rowCount()) {
            return true;
        }
        return false;
    }

    /***
     * Retorna todos os históricos 
     * */
    public function getHistoricos() {
        $conexao = Transacao::get();
        
        // Pega os históricos
        $resultado = $conexao->query("SELECT "
                . "projeto.nome as projeto, "
                . "usuario.nome as financiador, "
                . "historicodoacao.quantia "
                . " FROM `historicodoacao` "
                . "inner join projeto on projeto.id = historicodoacao.idProjeto "
                . "inner join usuario on usuario.id = historicodoacao.idFinanciador "
                . "");

        //coloca em um array
        $historico = $resultado->fetchObject();
        $retorno = array();
        while ($historico != null) {
            $retorno[] = $historico;
            $historico = $resultado->fetchObject();
        }
        
        return $retorno;
    }

    /***
     * Retorna todos os projetos
     */
    public function getProjetos() {
        $conexao = Transacao::get();
        $resultado = $conexao->query("SELECT * FROM projeto ORDER BY `projeto`.`dataDeCriacao` DESC");
        $projetos = array();
        $projeto = $resultado->fetchObject();
        while ($projeto != null) {
            $projetos[] = $projeto;
            $projeto = $resultado->fetchObject();
        }
        return $projetos;
    }

    /***
     * Retorna um projeto específico dado um idProjeto
     */
    public function getProjeto($idProjeto) {
        $conexao = Transacao::get();
        $resultado = $conexao->query("SELECT * FROM projeto WHERE id = $idProjeto");
        $obj = $resultado->fetchObject();
        if ($obj == null) {
            return null;
        }

        $projeto = new Projeto();
        foreach ($obj as $atr => $valor) {
            $set = "set" . ucfirst($atr);
            $projeto->$set($valor);
        }
        return $projeto;
    }

    /***
     * Muda as caracteristicas de um projeto no banco de dados via seu id
     */
    public function setProjeto($projeto) {
        $conexao = Transacao::get();
        $updateSet = array();

        // Pega todas os atributos de projeto
        $reflect = new ReflectionClass($projeto);
        $props = $reflect->getProperties(ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PUBLIC);

        // Monta um array que a chave é o nome do atributo e o valor seu valor
        foreach ($props as $prop) {
            $atr = $prop->getName();
            $get = "get" . ucfirst($prop->getName());
            $value = $projeto->$get();
            $updateSet[] = "$atr = '$value'";
        }

        // Altera no banco de dados
        $resultado = $conexao->query("UPDATE projeto SET " . implode(", ", $updateSet) . " WHERE id =' " . $projeto->getId() . "'");
        if ($resultado->rowCount()) {
            return true;
        }
        return false;
    }

    /***
     * Persiste um projeto no banco de dados
     */
    public function criarProjeto($projeto) {
        $conexao = Transacao::get();

        // Pega os dados
        $nome = $projeto->getNome();
        $fonte = $projeto->getFonte();
        $autor = $projeto->getAutor();
        $sinopse = $projeto->getSinopse();
        $generos = $projeto->getGeneros();
        $fundo = $projeto->getFundo();
        
        //Insere no banco
        $resultado = $conexao->query("INSERT INTO `projeto` "
                . "(`nome`, `fonte`, `autor`, `sinopse`, `generos`, `fundo`) "
                . "VALUES ('$nome', '$fonte', '$autor', '$sinopse', '$generos', '$fundo');");
        if ($resultado->rowCount()) {
            return true;
        }
        return false;
    }

}

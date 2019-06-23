<?php
/**
 * TODO Auto-generated comment.
 */
class ControleProjeto {

	/**
	 * TODO Auto-generated comment.
	 */
	public function doar($idProjeto, $financiador, $quantidade) {
		$conexao = Transacao::get();
		$conexao->query("UPDATE projeto set fundo=fundo+$quantidade where idProjeto = $idProjeto");
		$conexao->query("UPDATE financiador set cartera=carteira-$quantidade where idProjeto = $idProjeto");
		$conexao->query("INSERT historico ");

	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function designarFuncionario($idFuncionario, $idProjeto) {
		return false;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function excluirProjeto($idProjeto) {
		$conexao = Transacao::get();
		$resultado = $conexao->query("");
		if ($resultado->rowCount()) {
				return true;
		}
		return false;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getProjetos() {
		$conexao = Transacao::get();
		$resultado = $conexao->query("select * from projeto");
		$projetos = array();
		$projeto = $resultado->fetchObject();
		while ($projeto != null) {
			$projetos[] = $projeto;
			$projeto = $resultado->fetchObject();
		}
		return $projetos;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getProjeto($idProjeto) {
		return null;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setProjeto($projeto) {
		return false;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function criarProjeto($projeto) {
		$conexao = Transacao::get();
		$resultado = $conexao->query("");
		if ($resultado->rowCount()) {
				return true;
		}
		return false;


	}
}

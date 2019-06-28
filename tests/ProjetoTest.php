<?php

use PHPUnit\Framework\TestCase;

class ProjetoTest extends TestCase {

	public function testSettersGetters() {
		$projeto = new Projeto();
		$projeto->setId(1);
		$projeto->setNome("nome");
		$projeto->setFonte("fonte");
		$projeto->setAutor("autor");
		$projeto->setSinopse("sinopse");
		$projeto->setGeneros("genero");
		$projeto->setFundo(100.00);
		$projeto->setDataDeCriacao("1/1/1");
		$this->assertEquals(1, $projeto->getId());
		$this->assertEquals("nome", $projeto->getNome());
		$this->assertEquals("fonte", $projeto->getFonte());
		$this->assertEquals("autor", $projeto->getAutor());
		$this->assertEquals("sinopse", $projeto->getSinopse());
		$this->assertEquals("genero", $projeto->getGenero());
		$this->assertEquals(100.00, $projeto->getFundo());
		$this->assertEquals("1/1/1", $projeto->getDataDeCriacao());
	}
}
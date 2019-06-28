<?php

use PHPUnit\Framework\TestCase;

class UsuarioTest extends TestCase {
	public function testConstrutor() {
		$usuario = new Usuario(1, "1111", "email", "senha");
		$this->assertEquals(1, $usuario->getId());
		$this->assertEquals("1111", $usuario->getCpf());
		$this->assertEquals("email", $usuario->getEmail());
		$this->assertEquals(null, $usuario->getSenha());
	}

	public function testSettersGetters() {
		$usuario = new Usuario(1, "1111", "email", "senha");
		$usuario->setId(2);
		$usuario->setCpf("2222");
		$usuario->setEmail("email2");
		$usuario->setSenha("senha2");
		$this->assertEquals(2, $usuario->getId());
		$this->assertEquals("2222", $usuario->getCpf());
		$this->assertEquals("email2", $usuario->getEmail());
		$this->assertEquals("senha2", $usuario->getSenha());
	}
}
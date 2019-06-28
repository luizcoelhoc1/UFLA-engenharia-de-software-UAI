<?php

use PHPUnit\Framework\TestCase;

class ControleProjetoTest extends TestCase {
    public function testConstrutor() {
    	$projeto = new ControleProjeto();
        $this->assertTrue($projeto->doar(1,1,1));

    }
}
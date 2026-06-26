<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Cliente;

/**
 * @testdox Cliente (Tests\Cliente)
 * @covers \App\Cliente
 * @group cliente
 */
class ClienteTest extends TestCase
{
    /**
     * @testdox Nombre vacio
     * @covers \App\Cliente::__construct
     */
    public function testNombreVacio()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("El nombre no puede estar vacio");
        new Cliente('', 'test@email.com', '123456789');
    }

    /**
     * @testdox Email invalido
     * @covers \App\Cliente::__construct
     */
    public function testEmailInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("El formato del email es invalido");
        new Cliente('Juan Perez', 'email-invalido', '123456789');
    }
}

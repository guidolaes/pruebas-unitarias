<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\CoversClass;
use App\Cliente;
use App\Habitacion;
use App\Reserva;

/**
 * @testdox Reserva (Tests\Reserva)
 * @covers \App\Reserva
 * @group reserva
 */
#[Group('reserva')]
#[CoversClass(Reserva::class)]
class ReservaTest extends TestCase
{
    private Cliente $cliente;
    private Habitacion $habitacion;

    protected function setUp(): void
    {
        $this->cliente = new Cliente('Juan Perez', 'juan@email.com', '123456789');
        $this->habitacion = new Habitacion(101, 'Simple', 100.0);
    }

    /**
     * @testdox Fecha ingreso invalida
     * @covers \App\Reserva::__construct
     */
    public function testFechaIngresoInvalida(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("La fecha de ingreso debe tener el formato YYYY-MM-DD");
        new Reserva($this->cliente, $this->habitacion, '25-06-2026', '2026-06-28');
    }

    /**
     * @testdox Fecha ingreso pasado
     * @covers \App\Reserva::__construct
     */
    public function testFechaIngresoPasado(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("La fecha de ingreso no puede ser en el pasado");
        $ayer = (new \DateTime('yesterday'))->format('Y-m-d');
        $manana = (new \DateTime('tomorrow'))->format('Y-m-d');
        new Reserva($this->cliente, $this->habitacion, $ayer, $manana);
    }

    /**
     * @testdox Fecha salida anterior
     * @covers \App\Reserva::__construct
     */
    public function testFechaSalidaAnterior(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("La fecha de salida debe ser posterior a la fecha de ingreso");
        $hoy = (new \DateTime('today'))->format('Y-m-d');
        $ayer = (new \DateTime('yesterday'))->format('Y-m-d');
        new Reserva($this->cliente, $this->habitacion, $hoy, $ayer);
    }

    /**
     * @testdox Calcular total
     * @covers \App\Reserva::calcularTotal
     */
    public function testCalcularTotal(): void
    {
        $hoy = (new \DateTime('today'))->format('Y-m-d');
        $salida = (new \DateTime('today + 3 days'))->format('Y-m-d');
        
        $reserva = new Reserva($this->cliente, $this->habitacion, $hoy, $salida);
        $this->assertEquals(300.0, $reserva->calcularTotal());
    }
}

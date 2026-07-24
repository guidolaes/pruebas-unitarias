<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\CoversClass;
use App\Habitacion;

/**
 * @testdox Habitacion (Tests\Habitacion)
 * @covers \App\Habitacion
 * @group habitacion
 */
#[Group('habitacion')]
#[CoversClass(Habitacion::class)]
class HabitacionTest extends TestCase
{
    /**
     * @testdox Numero cero
     * @covers \App\Habitacion::__construct
     */
    public function testNumeroCero(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("El numero de habitacion debe ser positivo");
        new Habitacion(0, 'Simple', 100.0);
    }

    /**
     * @testdox Numero negativo
     * @covers \App\Habitacion::__construct
     */
    public function testNumeroNegativo(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("El numero de habitacion debe ser positivo");
        new Habitacion(-5, 'Simple', 100.0);
    }

    /**
     * @testdox Precio cero
     * @covers \App\Habitacion::__construct
     */
    public function testPrecioCero(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("El precio de la habitacion debe ser positivo");
        new Habitacion(101, 'Simple', 0.0);
    }

    /**
     * @testdox Precio negativo
     * @covers \App\Habitacion::__construct
     */
    public function testPrecioNegativo(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("El precio de la habitacion debe ser positivo");
        new Habitacion(101, 'Simple', -50.0);
    }

    /**
     * @testdox Reservar habitacion disponible
     * @covers \App\Habitacion::reservar
     * @covers \App\Habitacion::isDisponible
     */
    public function testReservarHabitacionDisponible(): void
    {
        $habitacion = new Habitacion(101, 'Simple', 100.0);
        $this->assertTrue($habitacion->isDisponible());
        $habitacion->reservar();
        $this->assertFalse($habitacion->isDisponible());
    }

    /**
     * @testdox Reservar habitacion no disponible
     * @covers \App\Habitacion::reservar
     */
    public function testReservarHabitacionNoDisponible(): void
    {
        $habitacion = new Habitacion(101, 'Simple', 100.0);
        $habitacion->reservar();
        
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("La habitacion ya no esta disponible");
        $habitacion->reservar();
    }
}

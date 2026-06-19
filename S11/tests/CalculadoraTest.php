<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Calculadora;

class CalculadoraTest extends TestCase
{
    private $calculadora;
    
    protected function setUp(): void
    {
        $this->calculadora = new Calculadora();
    }
    
    public static function proveedorDivisionNormal(): array
    {
        return [
            [10, 2, 5],
            [20, 4, 5],
            [9, 3, 3]
        ];
    }

    #[DataProvider('proveedorDivisionNormal')]
    public function testDividirNormal($dividendo, $divisor, $esperado)
    {
        $this->assertEquals($esperado, $this->calculadora->dividir($dividendo, $divisor));
    }
    
    public function testDividirEntreCero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("No se puede dividir por cero");
        $this->calculadora->dividir(10, 0);
    }
    
    public function testRaizCuadradaNormal()
    {
        $this->assertEquals(3, $this->calculadora->raizCuadrada(9));
    }
    
    public function testRaizCuadradaNegativa()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("No se puede calcular la raíz cuadrada de un número negativo");
        $this->calculadora->raizCuadrada(-9);
    }

    public function testFactorialNormal()
    {
        $this->assertEquals(120, $this->calculadora->factorial(5));
    }

    public function testFactorialCero()
    {
        $this->assertEquals(1, $this->calculadora->factorial(0));
    }

    public function testFactorialNegativo()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->calculadora->factorial(-5);
    }
}

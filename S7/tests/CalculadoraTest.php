<?php

use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase {

  private Calculadora $calculadora;

  protected function setUp(): void {
    $this->calculadora = new Calculadora();
  }

  public function testSumar() {
    $resultado = $this->calculadora->sumar(2, 3);
    $this->assertEquals(5, $resultado);
  }

  public function testSumarNumerosNegativos() {
    $resultado = $this->calculadora->sumar(-5, -5);
    $this->assertEquals(-10, $resultado);
  }

  public function testSumarLimite() {
    $resultado = $this->calculadora->sumar(-99, 99);
    $this->assertEquals(0, $resultado);
  }

  public function testRestar() {
    $resultado = $this->calculadora->restar(10, 4);
    $this->assertEquals(6, $resultado);
  }

  public function testMultiplicar() {
    $resultado = $this->calculadora->multiplicar(5, 5);
    $this->assertEquals(25, $resultado);
  }

  public function testDividir() {
    $resultado = $this->calculadora->dividir(20, 4);
    $this->assertEquals(5, $resultado);
  }

  public function testDividirPorCeroLanzaExcepcion() {
    $this->expectException(\InvalidArgumentException::class);
    $this->expectExceptionMessage("No se puede dividir por cero.");
    $this->calculadora->dividir(10, 0);
  }

  public function testValoresFlotantesExtremos() {
    $resultado = $this->calculadora->sumar(PHP_FLOAT_MAX, 0);
    $this->assertEquals(PHP_FLOAT_MAX, $resultado);
  }
}
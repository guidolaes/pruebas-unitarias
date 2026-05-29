<?php

namespace App;

class Calculadora {

  public function sumar(float|int $a, float|int $b): float|int {
    return $a + $b;
  }

  public function restar(float|int $a, float|int $b): float|int {
    return $a - $b;
  }

  public function multiplicar(float|int $a, float|int $b): float|int {
    return $a * $b;
  }

  public function dividir(float|int $a, float|int $b): float|int {
    if ($b == 0) {
      throw new \InvalidArgumentException("No se puede dividir por cero.");
    }
    return $a / $b;
  }
}
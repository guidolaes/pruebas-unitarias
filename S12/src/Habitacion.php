<?php

namespace App;

class Habitacion
{
    private int $numero;
    private string $tipo;
    private float $precio;
    private bool $disponible;

    public function __construct(int $numero, string $tipo, float $precio)
    {
        if ($numero <= 0) {
            throw new \InvalidArgumentException("El numero de habitacion debe ser positivo");
        }
        if ($precio <= 0) {
            throw new \InvalidArgumentException("El precio de la habitacion debe ser positivo");
        }
        $this->numero = $numero;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->disponible = true;
    }

    public function reservar(): void
    {
        if (!$this->disponible) {
            throw new \Exception("La habitacion ya no esta disponible");
        }
        $this->disponible = false;
    }

    public function isDisponible(): bool
    {
        return $this->disponible;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }
}

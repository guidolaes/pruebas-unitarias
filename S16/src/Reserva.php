<?php

namespace App;

class Reserva
{
    private Cliente $cliente;
    private Habitacion $habitacion;
    private string $fechaIngreso;
    private string $fechaSalida;

    public function __construct(Cliente $cliente, Habitacion $habitacion, string $fechaIngreso, string $fechaSalida)
    {
        $ingreso = \DateTime::createFromFormat('Y-m-d', $fechaIngreso);
        if (!$ingreso || $ingreso->format('Y-m-d') !== $fechaIngreso) {
            throw new \InvalidArgumentException("La fecha de ingreso debe tener el formato YYYY-MM-DD");
        }

        $salida = \DateTime::createFromFormat('Y-m-d', $fechaSalida);
        if (!$salida || $salida->format('Y-m-d') !== $fechaSalida) {
            throw new \InvalidArgumentException("La fecha de salida debe tener el formato YYYY-MM-DD");
        }

        $hoy = new \DateTime('today');
        if ($ingreso < $hoy) {
            throw new \InvalidArgumentException("La fecha de ingreso no puede ser en el pasado");
        }

        if ($salida <= $ingreso) {
            throw new \InvalidArgumentException("La fecha de salida debe ser posterior a la fecha de ingreso");
        }

        $this->cliente = $cliente;
        $this->habitacion = $habitacion;
        $this->fechaIngreso = $fechaIngreso;
        $this->fechaSalida = $fechaSalida;
    }

    public function calcularTotal(): float
    {
        $ingreso = new \DateTime($this->fechaIngreso);
        $salida = new \DateTime($this->fechaSalida);
        $dias = $ingreso->diff($salida)->days;
        return $dias * $this->habitacion->getPrecio();
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function getHabitacion(): Habitacion
    {
        return $this->habitacion;
    }
}

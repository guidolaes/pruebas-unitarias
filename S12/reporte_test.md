# Reporte de Ejecución de Pruebas Unitarias

**Proyecto:** Sistema de Reservas de Hotel - Hotel Paraíso
**Fecha:** 26/06/2026
**Responsable de QA:** Guido LaeS

## Comando de Ejecución
```bash
vendor/bin/phpunit tests --testdox
```

## Salida de Consola (--testdox)
```text
PHPUnit 11.5.55 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.4.7
Configuration: C:\Pirulug\Laragon\www\test\pruebas-unitarias\S12\phpunit.xml

............                                                      12 / 12 (100%)

Time: 00:00.072, Memory: 8.00 MB

Cliente (Tests\Cliente)
 ✔ Nombre vacio
 ✔ Email invalido

Habitacion (Tests\Habitacion)
 ✔ Numero cero
 ✔ Numero negativo
 ✔ Precio cero
 ✔ Precio negativo
 ✔ Reservar habitacion disponible
 ✔ Reservar habitacion no disponible

Reserva (Tests\Reserva)
 ✔ Fecha ingreso invalida
 ✔ Fecha ingreso pasado
 ✔ Fecha salida anterior
 ✔ Calcular total

OK (12 tests, 23 assertions)
```

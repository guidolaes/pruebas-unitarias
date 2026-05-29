# S8 — Calculadora: TDD y casos extremos

Evolución de la calculadora aplicando TDD y cubriendo casos extremos.

## Mejoras respecto a S7

- Pruebas con números negativos
- Pruebas con valores límite (`PHP_FLOAT_MAX`)
- Validación de excepciones (división por cero)
- Cobertura de casos borde

## Requisitos

- PHP 8.0+
- Composer

## Instalación

```bash
composer install
```

## Ejecutar pruebas

```bash
php vendor/bin/phpunit tests
```

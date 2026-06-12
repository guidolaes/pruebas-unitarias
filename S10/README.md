# S10 — PHPUnit: Proveedores de Datos (Data Providers) y Validación de Excepciones

En esta sesión se profundiza en el uso de pruebas unitarias avanzadas en **PHPUnit 11**, implementando proveedores de datos (`Data Providers`) mediante atributos de PHP 8+ y cubriendo la validación de excepciones.

## Características de la Sesión

- **Uso de Data Providers**: Implementación del atributo `#[DataProvider]` para ejecutar un único método de prueba con múltiples conjuntos de datos independientes.
- **Validación de Excepciones**: Comprobación del control de errores (como la división por cero en `Calculadora`) utilizando `$this->expectException()`.
- **Clases Implementadas**:
  - Calculadora: Métodos para sumar, restar, multiplicar y dividir (con control de división por cero).
  - Validador: Métodos auxiliares para comprobar si un número es par, positivo o negativo.

## Estructura de Archivos

- `src/`
  - Calculadora.php: Lógica matemática elemental.
  - Validador.php: Lógica de validación de números.
- `tests/`
  - CalculadoraTest.php: Suite de pruebas para `Calculadora` utilizando Data Providers.
  - ValidadorTest.php: Suite de pruebas para `Validador` con Data Providers.

## Requisitos

- PHP 8.2+
- Composer

## Instalación de Dependencias

Para instalar PHPUnit y configurar el cargador automático de PSR-4, ejecuta desde la carpeta `S10`:

```bash
composer install
```

## Ejecución de Pruebas

Para ejecutar todas las pruebas unitarias y verificar su correcto funcionamiento:

```bash
vendor/bin/phpunit
```

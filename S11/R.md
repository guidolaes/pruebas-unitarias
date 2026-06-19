## CODE COVERAGE

Se ha configurado e implementado el análisis de cobertura de código (Code Coverage) en el proyecto utilizando **Xdebug** y **PHPUnit**.

### 1. Configuración del Driver de Cobertura (Xdebug)

Para que PHPUnit pueda calcular la cobertura del código, requiere un driver de cobertura activo. En Windows con Laragon:
1. Se descargó el archivo binario correspondiente a PHP 8.4 ZTS x64 (`php_xdebug-3.5.3-8.4-ts-vs17-x86_64.dll`) de la página oficial de Xdebug.
2. Se copió la extensión a la carpeta de extensiones de PHP: `C:\Pirulug\Laragon\bin\php\php-8.4.7-Win32-vs17-x64\ext\php_xdebug.dll`.
3. Se modificó el archivo de configuración `php.ini` para habilitar la extensión con el modo de cobertura activo:
   ```ini
   [xdebug]
   zend_extension=xdebug
   xdebug.mode=coverage
   ```

### 2. Configuración en PHPUnit (`phpunit.xml`)

Se actualizó el archivo de configuración `phpunit.xml` para indicarle a PHPUnit qué directorio analizar para la cobertura (excluyendo la suite de pruebas):
```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit bootstrap="vendor/autoload.php"
         colors="true">
    <testsuites>
        <testsuite name="Tests">
            <directory>tests</directory>
        </testsuite>
    </testsuites>
    <source>
        <include>
            <directory>src</directory>
        </include>
    </source>
</phpunit>
```

### 3. Comandos para Ejecutar la Cobertura

#### Generar Reporte en Texto (Consola)
Para visualizar un resumen rápido de la cobertura directamente en la terminal:
```bash
vendor/bin/phpunit --coverage-text
```

#### Generar Reporte Visual en HTML
Para generar un reporte interactivo con detalles visuales línea por línea:
```bash
vendor/bin/phpunit --coverage-html coverage
```
Este comando creará una carpeta llamada `coverage` en el directorio raíz. Se puede abrir el archivo `coverage/index.html` en cualquier navegador web para analizar los detalles.

### 4. Resultado del Análisis Actual

Al ejecutar la cobertura en consola, se obtiene un resultado del **100% de cobertura** en todas las clases:

```text
Code Coverage Report:
 Summary:
  Classes: 100.00% (2/2)
  Methods: 100.00% (6/6)
  Lines:   100.00% (27/27)

App\Calculadora
  Methods: 100.00% ( 3/ 3)   Lines: 100.00% ( 14/ 14)
App\Validador
  Methods: 100.00% ( 3/ 3)   Lines: 100.00% ( 13/ 13)
```
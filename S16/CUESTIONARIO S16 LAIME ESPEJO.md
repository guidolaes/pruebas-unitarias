# Conclusiones - Guía de Práctica Nro 16

[https://github.com/guidolaes/pruebas-unitarias/tree/master/S16](https://github.com/guidolaes/pruebas-unitarias/tree/master/S16)

### Respuestas a las Preguntas de Conclusión

1. **Aprendizajes obtenidos**
   * **Importancia de las validaciones**: Se aprendió que las validaciones de datos en los constructores y métodos son fundamentales para garantizar la integridad de los datos en todo el sistema.
   * **Pruebas de casos límite**: Probar valores extremos y valores de frontera (como precios cero, fechas en el pasado o formatos inválidos) permite detectar errores que no se presentan en flujos convencionales.
   * **Documentación con anotaciones y atributos**: Utilizar atributos de PHPUnit como `#[CoversClass]` y `#[Group]` (así como anotaciones `@covers` y `@group`) facilita la categorización, el mantenimiento y la ejecución de subconjuntos de pruebas en suites grandes.

2. **Dificultades encontradas**
   * **Instalación de Xdebug/PCOV**: Se necesitó investigar la instalación y configuración adecuada de extensiones de cobertura de código en el entorno de desarrollo local en Windows.
   * **Validación de fechas**: El manejo estricto de formatos de fecha (`YYYY-MM-DD`) y la validación lógica entre fechas de ingreso y salida requirieron un análisis minucioso para evitar errores en el cálculo de estadías.

3. **Recomendaciones**
   * **Implementación en CI/CD**: Se recomienda integrar las pruebas unitarias automatizadas dentro de pipelines de Integración Continua para detectar errores de forma temprana antes del despliegue.
   * **Ampliación de casos de prueba**: Agregar más escenarios de prueba para cubrir integraciones con bases de datos y flujos de excepciones adicionales.

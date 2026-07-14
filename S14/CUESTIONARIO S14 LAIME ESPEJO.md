# Conclusiones - Guía de Práctica Nro 14

[https://github.com/guidolaes/pruebas-unitarias/tree/master/S14](https://github.com/guidolaes/pruebas-unitarias/tree/master/S14)

### Respuestas a las Preguntas de Conclusión

1. **¿Qué diferencia hay entre `setUp()` y `setUpBeforeClass()`?**
   * **`setUp()`**: Es un método no estático que se ejecuta automáticamente **antes de cada uno** de los métodos de prueba individuales. Se utiliza para inicializar objetos o datos frescos específicos de cada test para garantizar su aislamiento.
   * **`setUpBeforeClass()`**: Es un método estático (`public static function`) que se ejecuta **una sola vez** antes de iniciar cualquiera de las pruebas de la clase. Se usa para operaciones de configuración costosas a nivel global que no necesitan recrearse en cada test.

2. **¿Por qué es importante usar `tearDown()` en pruebas con base de datos?**
   * Es fundamental para restaurar el estado inicial de la base de datos eliminando o deshaciendo los cambios realizados por el test en ejecución. Esto asegura que la base de datos quede en un estado limpio y predecible antes de que comience el siguiente test, evitando efectos colaterales entre pruebas (principio de aislamiento).

3. **¿Qué pasaría si no usáramos `tearDown()` y ejecutáramos muchas pruebas?**
   * Se presentarían múltiples fallas colaterales y de rendimiento:
     * **Polución de datos**: Los registros creados en una prueba permanecerían en la base de datos, lo que alteraría los resultados de consultas de agregación (por ejemplo, conteos o sumas) en otras pruebas.
     * **Conflictos de integridad**: Ocurrirían errores de base de datos debido a violaciones de llaves primarias (`PRIMARY KEY`) o de valores únicos al reinsertar registros de prueba repetidos.
     * **Consumo de recursos**: Se produciría una fuga en el uso de memoria o almacenamiento de la base de datos al acumular registros innecesarios de forma indefinida durante suites de pruebas grandes.

4. **¿En qué casos usarías `setUpBeforeClass()`?**
   * Se utiliza cuando la configuración de un entorno de prueba requiere recursos de alto costo en tiempo y procesamiento, y dicho estado puede ser compartido de manera segura. Ejemplos de uso:
     * Migración e inicialización del esquema de una base de datos antes de poblarla.
     * Conexión inicial a bases de datos o servicios externos remotos.
     * Inicio o levantamiento de un servidor de prueba simulado (Mock API server).
     * Lectura y procesamiento de archivos de configuración masivos.

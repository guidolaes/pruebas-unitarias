# Conclusiones - Guía de Práctica Nro 13

[https://github.com/guidolaes/pruebas-unitarias/tree/master/S13](https://github.com/guidolaes/pruebas-unitarias/tree/master/S13)

### Respuestas a las Preguntas de Conclusión

1. **¿Qué son los comentarios en programación?**
   * Son bloques de texto o anotaciones dentro del código fuente de un programa cuyo propósito es explicar el funcionamiento, la intención o el contexto de ciertas líneas de código para otros desarrolladores (o para uno mismo en el futuro). Estas instrucciones son ignoradas por completo por el compilador o intérprete durante la ejecución.

2. **¿Qué etiqueta JSDoc se usa para documentar un parámetro?**
   * Se utiliza la etiqueta `@param`, la cual permite especificar el tipo de dato esperado entre llaves `{}` seguido del nombre del parámetro y una breve descripción explicativa.
     * Ejemplo: `@param {number} a - Primer número`

3. **¿Qué etiqueta JSDoc se usa para documentar el valor de retorno?**
   * Se utiliza la etiqueta `@returns` (o `@return`), que especifica el tipo de dato que devuelve la función y una descripción detallada de este valor.
     * Ejemplo: `@returns {number} La suma de a y b`

4. **¿Por qué es importante documentar el código?**
   * Documentar el código es fundamental para la mantenibilidad y la colaboración en el desarrollo de software. Facilita la comprensión rápida del flujo de datos, define de manera clara los contratos de las funciones (entradas, salidas y excepciones) y reduce la curva de aprendizaje al integrarse nuevos miembros al equipo. Además, la documentación estandarizada mediante JSDoc permite a los entornos de desarrollo (como VS Code) ofrecer autocompletado avanzado (IntelliSense) y detección estática de errores de tipos.

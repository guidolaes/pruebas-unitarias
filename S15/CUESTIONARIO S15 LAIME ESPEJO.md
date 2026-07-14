# Conclusiones - Guía de Práctica Nro 15

[https://github.com/guidolaes/pruebas-unitarias/tree/master/S15](https://github.com/guidolaes/pruebas-unitarias/tree/master/S15)

### Respuestas a las Preguntas de Conclusión

1. **¿Qué diferencia hay entre comparar objetos con `assertEquals` y `assertSame`? Da un ejemplo.**
   * **`assertEquals`**: Realiza una comparación por valor. Compara los atributos de los objetos de forma recursiva. Dos instancias distintas se consideran iguales si tienen el mismo tipo y sus propiedades contienen los mismos valores.
     * *Ejemplo*:
       ```php
       $usuario1 = new Usuario('Juan', 'juan@mail.com', 25);
       $usuario2 = new Usuario('Juan', 'juan@mail.com', 25);
       $this->assertEquals($usuario1, $usuario2); // Pasa (valores idénticos)
       ```
   * **`assertSame`**: Realiza una comparación por identidad (referencia en memoria). Dos variables solo se consideran idénticas si apuntan exactamente a la misma instancia del objeto en la memoria.
     * *Ejemplo*:
       ```php
       $usuario1 = new Usuario('Juan', 'juan@mail.com', 25);
       $usuario2 = new Usuario('Juan', 'juan@mail.com', 25);
       $this->assertSame($usuario1, $usuario2); // Falla (diferentes instancias)
       
       $usuario3 = $usuario1;
       $this->assertSame($usuario1, $usuario3); // Pasa (misma referencia en memoria)
       ```

2. **¿Cuándo usarías `assertInstanceOf`?**
   * Se debe usar al realizar pruebas de integración o unitarias donde se necesita verificar que una función, método de fábrica (factory) o inyección de dependencias devuelva un objeto del tipo de clase o interfaz esperada. Esto asegura el cumplimiento de la firma del contrato y la tipificación correcta del objeto.
     * Ejemplo: `$this->assertInstanceOf(Usuario::class, $resultado);`

3. **¿Qué ventaja tiene usar mensajes personalizados en aserciones?**
   * Su mayor ventaja es agilizar el proceso de depuración (debugging) cuando una prueba falla, en especial en pipelines de Integración Continua (CI). En lugar de recibir un mensaje genérico de error de comparación, el mensaje personalizado explica el contexto de negocio de la falla de forma clara e inmediata, reduciendo el tiempo de análisis del error.
     * Ejemplo: `$this->assertEquals('Alberto Perez', $usuario->getNombre(), 'Error: El nombre obtenido no coincide con el nombre de registro del usuario.');`

4. **¿Qué aserción usarías para verificar que un array contiene un elemento específico?**
   * Se utiliza la aserción `assertContains()`. Para su contraparte (verificar que no lo contenga), se utiliza `assertNotContains()`.
     * Ejemplo: `$this->assertContains(3, $arrayDeNumeros);`

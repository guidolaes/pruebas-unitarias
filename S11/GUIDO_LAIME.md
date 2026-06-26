Conclusiones - Guía de Práctica Nro 11 (Proveedores de Datos y Excepciones)
Respuestas a las Preguntas de Conclusión

[Guithub](https://github.com/guidolaes/pruebas-unitarias/tree/master/S11)

## ¿Qué diferencia hay entre expectException y expectExceptionMessage?

expectException define el tipo o clase de la excepción esperada (por ejemplo, \InvalidArgumentException::class).
expectExceptionMessage define el mensaje de texto exacto o parcial que se espera que contenga la excepción al ser lanzada.

## ¿Por qué es importante colocar expectException ANTES de ejecutar el código?

En PHP, el lanzamiento de una excepción interrumpe de forma inmediata el flujo normal de ejecución. Si se coloca la expectativa después de la línea que causa la excepción, el método de prueba finalizará abruptamente antes de llegar a la instrucción de validación, ocasionando que la prueba falle por no capturar la excepción esperada.

## ¿Qué pasa si una función debe lanzar una excepción pero no lo hace?

PHPUnit considerará que la prueba ha fallado (Failure). Esto se debe a que la directiva de expectativa le indica al entorno de pruebas que la ejecución no debe finalizar de forma exitosa sin haber disparado antes la excepción configurada.

## ¿En qué situaciones de un proyecto real usarías expectException?

Validación de argumentos y formato de datos: Cuando una clase de negocio o un servicio requiere verificar que la información provista cumple con formatos válidos (por ejemplo, correos electrónicos, longitudes de contraseña, valores numéricos no negativos).
Control de errores de infraestructura: Al simular o interactuar con APIs de terceros, bases de datos o servicios de almacenamiento, validando que el sistema responda correctamente lanzando excepciones controladas ante fallos de conexión o credenciales erróneas.
Reglas de negocio y estado del dominio: Para comprobar que los flujos de dominio reaccionen de manera segura lanzando excepciones cuando se intentan realizar operaciones inválidas (por ejemplo, un retiro de dinero sin fondos suficientes o la modificación de un registro ya cancelado).
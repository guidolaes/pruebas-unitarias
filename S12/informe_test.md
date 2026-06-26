# Reporte de Pruebas Unitarias - Sistema de Reservas de Hotel

**Fecha:** 26/06/2026
**Responsable:** Guido Laime

## Resultados de la Ejecución
- **Total de pruebas:** 12
- **Pruebas pasadas:** 12
- **Pruebas fallidas:** 0
- **Aserciones realizadas:** 23

---

## Errores encontrados y corregidos

| ID | Clase | Error Identificado | Solución Aplicada |
| :--- | :--- | :--- | :--- |
| **CP-01** | `Cliente` | El constructor permite crear un cliente sin nombre. | Se agregó una validación `trim($nombre) === ''` en el constructor, lanzando `\InvalidArgumentException` si está vacío. |
| **CP-02** | `Cliente` | El constructor permite cualquier valor en el email. | Se agregó validación usando `filter_var($email, FILTER_VALIDATE_EMAIL)` en el constructor, lanzando `\InvalidArgumentException` si es inválido. |
| **CP-03** | `Habitacion` | El constructor permite número de habitación cero o negativo. | Se agregó una validación en el constructor para verificar que `$numero > 0`, lanzando `\InvalidArgumentException` si no lo es. |
| **CP-04** | `Habitacion` | El constructor permite un precio cero o negativo. | Se agregó una validación en el constructor para verificar que `$precio > 0`, lanzando `\InvalidArgumentException` si no lo es. |
| **CP-05** | `Habitacion` | El método `reservar()` no verifica la disponibilidad de la habitación. | Se modificó el método `reservar()` para verificar el estado de `$this->disponible` antes de proceder al cambio de estado. |
| **CP-06** | `Habitacion` | No lanza excepción si se intenta reservar una habitación no disponible. | Se implementó el lanzamiento de una `\Exception` si se llama a `reservar()` cuando `$this->disponible` es `false`. |
| **CP-07** | `Reserva` | El constructor no verifica que la fecha de ingreso tenga formato `YYYY-MM-DD`. | Se agregó validación de formato usando `DateTime::createFromFormat('Y-m-d', ...)` en el constructor, lanzando `\InvalidArgumentException` si no cumple. |
| **CP-08** | `Reserva` | El constructor permite fechas de ingreso en el pasado. | Se agregó comparación de `$fechaIngreso` contra la fecha actual (`new DateTime('today')`), lanzando `\InvalidArgumentException` si es menor. |
| **CP-09** | `Reserva` | El constructor permite que la fecha de salida sea anterior o igual a la de ingreso. | Se implementó una comprobación en el constructor que valida que `$fechaSalida` sea estrictamente mayor a `$fechaIngreso`, lanzando `\InvalidArgumentException` en caso contrario. |
| **CP-10** | `Reserva` | El método `calcularTotal()` utiliza un valor fijo de 1 día de estadía. | Se modificó el método para calcular los días de estadía reales calculando la diferencia entre fechas (`$ingreso->diff($salida)->days`) y multiplicándolo por el precio obtenido de la habitación. |

---

## Conclusiones

### 1. ¿Qué importancia tiene el rol del QA en el proceso de desarrollo?
El rol del aseguramiento de calidad (QA) es fundamental para garantizar que el software cumpla estrictamente con las especificaciones del cliente y los criterios de aceptación técnicos. Su enfoque ayuda a identificar errores lógicos ocultos, flujos alternativos mal manejados y fallos de validación tempranamente, disminuyendo drásticamente el costo de corrección de bugs en producción y protegiendo la reputación y estabilidad de la aplicación.

### 2. ¿Cómo cambia tu enfoque al trabajar con un plan de pruebas ya elaborado?
Trabajar con un plan de pruebas predefinido proporciona un marco de trabajo ordenado y sistemático. Elimina la improvisación al definir claramente qué componentes deben evaluarse, cuáles son los valores de frontera y qué comportamientos de salida (incluyendo excepciones y errores) se esperan de cada clase, permitiendo que la codificación y la verificación avancen de manera ágil y alineada hacia un estándar preestablecido de calidad.

### 3. ¿Qué ventaja tiene documentar las pruebas con `@covers` y `@group`?
- **Uso de `@covers`**: Vincula explícitamente una clase de prueba o un método de prueba con el componente específico del código de producción que se está evaluando. Esto evita falsos positivos en los informes de cobertura de código y permite identificar con precisión qué partes de la lógica no han sido probadas.
- **Uso de `@group`**: Facilita la categorización lógica de las pruebas (por ejemplo, asociándolas a módulos específicos como `cliente`, `habitacion` o `reserva`). Permite ejecutar subconjuntos de pruebas específicos según la necesidad (por ejemplo, ejecutar solo pruebas de un módulo o ejecutar pruebas críticas rápidas), lo que optimiza significativamente los tiempos de ejecución en flujos de integración continua (CI/CD).

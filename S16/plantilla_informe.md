# INFORME FINAL DE PRUEBAS UNITARIAS

## Sistema de Reservas de Hotel

**Fecha:** 24/07/2026  
**Autor:** Guido Laime Espejo  
**Curso:** Prueba unitaria de software  

---

## 1. INTRODUCCIÓN

Se ha realizado la implementación y ejecución completa de pruebas unitarias sobre el **Sistema de Reservas de Hotel** desarrollado para la cadena "Hotel Paraíso". El propósito fundamental del informe es documentar el proceso de planificación, diseño de casos de prueba, ejecución de aserciones, mediciones de cobertura de código y lecciones aprendidas durante la verificación de las clases principales del sistema: `Cliente`, `Habitacion` y `Reserva`.

---

## 2. PLAN DE PRUEBAS

### 2.1 Alcance

**Se prueba:**

- Creación e instanciación de clientes (validación de nombre no vacío, formato válido de email y teléfono).
- Creación de habitaciones (números de habitación positivos, precios positivos y estado inicial de disponibilidad).
- Gestión de reservas (cambio de estado de disponibilidad al reservar y control de intentos sobre habitaciones no disponibles).
- Cálculo de totales de reserva según los días de estadía reales.
- Validaciones estrictas de fechas (formato `YYYY-MM-DD`, prohibición de fechas de ingreso en el pasado y fecha de salida estrictamente posterior a la fecha de ingreso).

**No se prueba:**

- Interfaz gráfica de usuario (UI/Frontend).
- Conexión e integración con motores de base de datos relacionales reales.

### 2.2 Objetivos

1. Validar la integridad y consistencia de los datos almacenados en los objetos del dominio (`Cliente`, `Habitacion`, `Reserva`).
2. Verificar que las excepciones correspondientes (`InvalidArgumentException` y `Exception`) sean lanzadas adecuadamente ante entradas de datos inválidos o estados no permitidos.
3. Asegurar la precisión del cálculo económico en la tarifa total acumulada de estadía.
4. Documentar y organizar la suite de pruebas aplicando atributos modernos de PHPUnit 11 / 13 (`#[Group]`, `#[CoversClass]`) y anotaciones estructuradas.

### 2.3 Estrategia de pruebas

| **Elemento**     | **Descripción**                                                                   |
| :--------------- | :-------------------------------------------------------------------------------- |
| **Tipo**         | Pruebas unitarias                                                                 |
| **Herramientas** | PHPUnit 11 / 13 (con Atributos `#[Group]`, `#[CoversClass]`)                      |
| **Enfoque**      | Casos límite, valores de frontera y validación estricta del lanzamiento de errores |
| **Cobertura**    | Xdebug / PCOV                                                                     |

---

## 3. CASOS DE PRUEBA DOCUMENTADOS

| **ID** | **Clase**  | **Método**    | **Caso de prueba**       | **Resultado esperado**         |
| :----- | :--------- | :------------ | :----------------------- | :----------------------------- |
| CP-01  | Cliente    | \_\_construct | Nombre vacío             | Lanza InvalidArgumentException |
| CP-02  | Cliente    | \_\_construct | Email inválido           | Lanza InvalidArgumentException |
| CP-03  | Habitacion | \_\_construct | Número cero o negativo   | Lanza InvalidArgumentException |
| CP-04  | Habitacion | \_\_construct | Precio cero o negativo   | Lanza InvalidArgumentException |
| CP-05  | Habitacion | reservar      | Habitación disponible    | Cambia a no disponible         |
| CP-06  | Habitacion | reservar      | Habitación no disponible | Lanza Exception                |
| CP-07  | Reserva    | \_\_construct | Fecha ingreso inválida   | Lanza InvalidArgumentException |
| CP-08  | Reserva    | \_\_construct | Fecha ingreso en pasado  | Lanza InvalidArgumentException |
| CP-09  | Reserva    | \_\_construct | Fecha salida anterior    | Lanza InvalidArgumentException |
| CP-10  | Reserva    | calcularTotal | 3 días de estadía        | Total = precio \* 3            |

---

## 4. ESTRUCTURA DEL CÓDIGO

```text
src/
  Cliente.php
  Habitacion.php
  Reserva.php

tests/
  ClienteTest.php
  HabitacionTest.php
  ReservaTest.php
```

---

## 5. RESULTADOS DE EJECUCIÓN

### 5.1 Resumen de Resultados

| **ID** | **Caso de prueba**       | **Estado** | **Detalles**                     |
| :----- | :----------------------- | :--------- | :------------------------------- |
| CP-01  | Nombre vacío             | OK         | Se lanza excepción correctamente |
| CP-02  | Email inválido           | OK         | Se lanza excepción correctamente |
| CP-03  | Número cero / negativo   | OK         | Se lanza excepción correctamente |
| CP-04  | Precio cero / negativo   | OK         | Se lanza excepción correctamente |
| CP-05  | Habitación disponible    | OK         | Se marca como no disponible      |
| CP-06  | Habitación no disponible | OK         | Se lanza excepción correctamente |
| CP-07  | Fecha ingreso inválida   | OK         | Se lanza excepción correctamente |
| CP-08  | Fecha ingreso en pasado  | OK         | Se lanza excepción correctamente |
| CP-09  | Fecha salida anterior    | OK         | Se lanza excepción correctamente |
| CP-10  | Calcular total de 3 días | OK         | Total = $300.00 (Tarifa diaria * 3) |

**Resumen Estadístico:**
- **Total de pruebas:** 12  
- **Pruebas pasadas:** 12  
- **Pruebas fallidas:** 0  
- **Aserciones ejecutadas:** 23  

---

## 6. COBERTURA DE CÓDIGO

Code Coverage Report:
- **Classes:** 100.00% (3/3)
- **Methods:** 100.00% (10/10)
- **Lines:** 95.65% (44/46)

---

## 7. CONCLUSIONES Y APRENDIZAJES

### 7.1 Aprendizajes obtenidos

1. **Importancia de las validaciones:** Se aprendió que las validaciones de datos en los constructores y métodos son fundamentales para garantizar la integridad del sistema antes de procesar reglas de negocio más complejas.
2. **Pruebas de casos límite:** Probar valores extremos (como precios cero, números negativos o fechas en el pasado) ayuda a detectar errores de lógica que no son visibles en los casos de uso felices.
3. **Documentación con anotaciones y atributos:** El uso de atributos en PHPUnit (`#[CoversClass]`, `#[Group]`) y anotaciones docblock facilita la organización, categorización y mantenimiento de la suite de pruebas.

### 7.2 Dificultades encontradas

1. **Instalación de Xdebug/PCOV:** Se necesitó investigar la configuración de herramientas y extensiones de cobertura dentro del entorno de desarrollo local en Windows.
2. **Validación de fechas:** El formato de fecha (`YYYY-MM-DD`) y las comprobaciones comparativas entre la fecha actual, fecha de ingreso y fecha de salida requirieron atención especial.

---

## 8. RECOMENDACIONES

1. **Implementar pruebas en el pipeline de CI/CD:** Integrar la ejecución automatizada de pruebas PHPUnit en cada commit o pull request.
2. **Agregar más casos de prueba:** Cubrir escenarios adicionales e incorporar pruebas de integración con persistencia en base de datos real.

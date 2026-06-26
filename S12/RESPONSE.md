# Conclusiones - Guía de Práctica Nro 12

(https://github.com/guidolaes/pruebas-unitarias/tree/master/S12)[https://github.com/guidolaes/pruebas-unitarias/tree/master/S12]

### Respuestas a las Preguntas de Conclusión

1. **¿Qué importancia tiene el rol del QA en el proceso de desarrollo?**
   * El rol de aseguramiento de la calidad (QA) es fundamental para garantizar que el software se construya de acuerdo a las especificaciones y reglas de negocio establecidas. QA actúa como un filtro crítico que identifica de manera preventiva flujos de excepción no manejados, vulnerabilidades y fallos de lógica antes de que el código llegue a producción, lo que optimiza costos y asegura una experiencia de usuario final confiable y robusta.

2. **¿Cómo cambia tu enfoque al trabajar con un plan de pruebas ya elaborado?**
   * Trabajar con un plan de pruebas estructurado y previamente elaborado proporciona una dirección y objetivos sumamente claros. Permite centrar los esfuerzos en la correcta implementación de las aserciones, el tratamiento de los casos límites y la validación de las salidas de error esperadas, eliminando la improvisación y asegurando una cobertura integral y metódica de los requerimientos de software.

3. **¿Qué ventaja tiene documentar las pruebas con `@covers` y `@group`?**
   * **Uso de `@covers`**: Establece un vínculo explícito y directo entre la clase de prueba y el archivo/clase de negocio que está cubriendo. Esto permite generar estadísticas precisas de cobertura de código (code coverage) y evita interpretaciones erróneas sobre qué partes del sistema ya han sido debidamente validadas.
   * **Uso de `@group`**: Facilita la categorización lógica y organización de las pruebas por módulos o tipos (por ejemplo, segmentar pruebas rápidas de unitarias frente a las de integración). Esto es de gran utilidad al ejecutar subconjuntos específicos de pruebas en entornos locales o dentro de flujos de integración continua (CI) para agilizar las validaciones críticas.

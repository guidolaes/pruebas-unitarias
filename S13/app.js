/**
 * Suma dos números
 * @param {number} a - Primer número
 * @param {number} b - Segundo número
 * @returns {number} La suma de a y b
 */
function sumar(a, b) {
    // Retorna el resultado de la suma
    return a + b;
}

/**
 * Resta dos números
 * @param {number} a - Minuendo
 * @param {number} b - Sustraendo
 * @returns {number} La diferencia entre a y b
 */
function restar(a, b) {
    // Retorna el resultado de la resta
    return a - b;
}

/**
 * Multiplica dos números
 * @param {number} a - Primer factor
 * @param {number} b - Segundo factor
 * @returns {number} El producto de a y b
 */
function multiplicar(a, b) {
    // Retorna el resultado de la multiplicación
    return a * b;
}

/**
 * Divide dos números y valida divisiones por cero
 * @param {number} a - Dividendo
 * @param {number} b - Divisor
 * @returns {number|string} El cociente o un mensaje de error si el divisor es cero
 */
function dividir(a, b) {
    // Valida si el divisor es cero para evitar una división indeterminada
    if (b === 0) {
        return "Error: División por cero";
    }
    // Retorna el resultado de la división
    return a / b;
}

/**
 * Realiza las cuatro operaciones matemáticas básicas (suma, resta, multiplicación y división) con dos números
 * @param {number} a - Primer número
 * @param {number} b - Segundo número
 * @returns {Object} Un objeto con los resultados de las cuatro operaciones
 */
function calcularTodo(a, b) {
    // Retorna un objeto con los resultados de las cuatro operaciones
    return {
        suma: sumar(a, b),
        resta: restar(a, b),
        multiplicacion: multiplicar(a, b),
        division: dividir(a, b)
    };
}

// Ejecución de prueba con los valores indicados en la guía (10 y 5)
console.log(calcularTodo(10, 5));

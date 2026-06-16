<?php
// Activamos el modo estricto de tipos en PHP.
// Así si pasamos tipos incorrectos a las funciones (por ejemplo, un string en lugar de un int)
// PHP lanzará errores y podremos detectar mejor los fallos.
declare(strict_types=1);

////////////////////////////////////////////////////////
// 1. FUNCIÓN FACTORIAL
////////////////////////////////////////////////////////

/*
 * Calcula el factorial de un número entero n.
 * - Definición: n! = n · (n - 1) · (n - 2) · ... · 1
 * - Caso especial: 0! = 1
 * - Solo tiene sentido para n >= 0
 *
 * Parám: int $n  → número entero del que queremos el factorial
 * Devuelve: int → resultado del factorial de $n
 */
function factorial(int $n): int {
    // Comprobamos que n no sea negativo. Si lo es, lanzamos una excepción.
    if ($n < 0) {
        throw new InvalidArgumentException("El factorial no existe para negativos");
    }

    // Caso base de la recursividad:
    // si n es 0 o 1, devolvemos 1 directamente y no seguimos llamando a factorial.
    if ($n === 0 || $n === 1) {
        return 1;
    }

    // Caso recursivo:
    // factorial(n) = n * factorial(n - 1)
    // La función se llama a sí misma con un valor más pequeño hasta llegar al caso base.
    return $n * factorial($n - 1);
}

////////////////////////////////////////////////////////
// 2. FUNCIÓN FIBONACCI
////////////////////////////////////////////////////////

/*
 * Genera la serie de Fibonacci con longitud n.
 * La serie de Fibonacci empieza con 0, 1 y cada término
 * es la suma de los dos anteriores.
 *
 * Ejemplo para n = 8 → [0, 1, 1, 2, 3, 5, 8, 13]
 *
 * Parám: int $n   → cantidad de términos que queremos en la serie
 * Devuelve: array → array de enteros con la serie de Fibonacci
 */
function fibonacci(int $n): array {
    // Si n es menor o igual que 0, no tiene sentido devolver elementos.
    if ($n <= 0) {
        return [];
    }

    // Si solo queremos un elemento, por convenio devolvemos [0].
    if ($n === 1) {
        return [0];
    }

    // Creamos la serie con los dos primeros términos conocidos: 0 y 1.
    $serie = [0, 1];

    // A partir de la posición 2, cada elemento es la suma de los dos anteriores.
    for ($i = 2; $i < $n; $i++) {
        $serie[] = $serie[$i - 1] + $serie[$i - 2];
    }

    return $serie;
}

////////////////////////////////////////////////////////
// 3. FUNCIÓN esPrimo
////////////////////////////////////////////////////////

/*
 * Determina si un número entero es primo.
 * Un número primo es mayor o igual que 2 y solo divisible por 1 y por sí mismo.
 *
 * Parám: int $n   → número a comprobar
 * Devuelve: bool  → true si es primo, false si no lo es
 */
function esPrimo(int $n): bool {
    // Los números menores que 2 NO son primos (0, 1, negativos).
    if ($n < 2) {
        return false;
    }

    // El 2 es el único número primo par.
    if ($n === 2) {
        return true;
    }

    // Si es par y no es 2, no puede ser primo.
    if ($n % 2 === 0) {
        return false;
    }

    // Comprobamos si tiene divisores desde 3 hasta la raíz cuadrada de n.
    // - Si encontramos un divisor, no es primo.
    // - Vamos de 2 en 2 (solo impares), porque ya descartamos los pares.
    for ($i = 3; $i <= sqrt($n); $i += 2) {
        // Si n es divisible por i, entonces n NO es primo.
        if ($n % $i === 0) {
            return false;
        }
    }

    // Si no hemos encontrado ningún divisor, el número sí es primo.
    return true;
}

////////////////////////////////////////////////////////
// 4. FUNCIÓN MCD (Máximo Común Divisor)
////////////////////////////////////////////////////////

/*
 * Calcula el Máximo Común Divisor (MCD) de dos enteros usando
 * el algoritmo de Euclides.
 *
 * Idea del algoritmo de Euclides:
 *   mcd(a, b) = mcd(b, a % b)
 *   Repetimos este proceso hasta que b sea 0. En ese momento, el MCD es a.
 *
 * Parám: int $a, int $b → números enteros
 * Devuelve: int         → MCD de $a y $b
 */
function mcd(int $a, int $b): int {
    // Trabajamos con valores absolutos por si llegan números negativos.
    $a = abs($a);
    $b = abs($b);

    // Repetimos mientras el segundo número sea distinto de 0.
    while ($b !== 0) {
        // Guardamos el valor de b en una variable temporal.
        $temp = $b;
        // Calculamos el resto de dividir a entre b.
        $b = $a % $b;
        // Actualizamos a con el valor anterior de b.
        $a = $temp;
    }

    // Cuando b es 0, el valor de a es el MCD.
    return $a;
}

////////////////////////////////////////////////////////
// 5. FUNCIÓN MCM (Mínimo Común Múltiplo)
////////////////////////////////////////////////////////

/*
 * Calcula el Mínimo Común Múltiplo (MCM) de dos enteros.
 * Fórmula: mcm(a, b) = |a · b| / mcd(a, b)
 *
 * Parám: int $a, int $b → números enteros
 * Devuelve: int         → MCM de $a y $b
 */
function mcm(int $a, int $b): int {
    // Si alguno de los dos es 0, el MCM es 0 (no hay múltiplo común distinto de 0).
    if ($a === 0 || $b === 0) {
        return 0;
    }

    // Usamos intdiv para hacer división entera y evitar problemas con floats.
    return intdiv(abs($a * $b), mcd($a, $b));
}

////////////////////////////////////////////////////////
// 6. FUNCIÓN ESTADISTICA
////////////////////////////////////////////////////////

/*
 * Calcula varias medidas estadísticas básicas sobre un conjunto de datos numéricos:
 * - Media
 * - Mediana
 * - Moda (puede haber más de una)
 * - Varianza
 * - Desviación típica
 *
 * Parám: array $datos → array de números (enteros o decimales)
 * Devuelve: array     → array asociativo con las claves:
 *                       "media", "mediana", "moda", "varianza", "desviacion"
 */
function estadistica(array $datos): array {
    // Si el array está vacío, no podemos calcular estadísticos.
    if (count($datos) === 0) {
        throw new InvalidArgumentException("El array de datos no puede estar vacío");
    }

    // Ordenamos los datos de menor a mayor para poder calcular la mediana y facilitar otros cálculos.
    sort($datos);

    // Guardamos el número de elementos y la suma.
    $n    = count($datos);
    $suma = array_sum($datos);

    // Media aritmética: suma de los datos / número de datos.
    $media = $suma / $n;

    // Cálculo de la mediana:
    // - Si n es impar, la mediana es el valor del centro.
    // - Si n es par, la mediana es la media de los dos valores centrales.
    if ($n % 2 === 1) {
        // Para n impar, usamos intdiv para obtener la posición central.
        $mediana = $datos[intdiv($n, 2)];
    } else {
        // Para n par, cogemos los dos valores centrales y hacemos su media.
        $mediana = ($datos[$n / 2 - 1] + $datos[$n / 2]) / 2;
    }

    // Cálculo de la moda:
    // - array_count_values cuenta cuántas veces aparece cada valor.
    // - max nos da la frecuencia máxima.
    // - array_keys nos devuelve todas las claves (valores originales) que tienen esa frecuencia máxima.
    $frecuencias = array_count_values($datos);
    $maxFreq     = max($frecuencias);
    $moda        = array_keys($frecuencias, $maxFreq);

    // Cálculo de la varianza:
    // - Para cada valor x, calculamos (x - media)^2.
    // - Sumamos todos esos valores.
    // - Dividimos entre n (varianza poblacional).
    $sumaCuadrados = array_sum(array_map(
        // Usamos una función anónima (closure) que recibe x y devuelve la distancia al cuadrado.
        fn($x) => ($x - $media) ** 2,
        $datos
    ));
    $varianza = $sumaCuadrados / $n;

    // La desviación típica es la raíz cuadrada de la varianza.
    $desviacion = sqrt($varianza);

    // Devolvemos un array asociativo con todos los resultados.
    return [
        "media"      => $media,
        "mediana"    => $mediana,
        "moda"       => $moda,
        "varianza"   => $varianza,
        "desviacion" => $desviacion,
    ];
}

////////////////////////////////////////////////////////
// 7. LLAMADAS A LAS FUNCIONES (EJEMPLOS)
////////////////////////////////////////////////////////

// Ejemplo de uso de factorial: 5! = 120
echo "5! = " . factorial(5) . "<br>";

// Ejemplo de uso de fibonacci: mostramos los 8 primeros términos de la serie.
echo "Fibonacci(8): " . implode(", ", fibonacci(8)) . "<br>";

// Ejemplo de uso de esPrimo: comprobamos si 17 es primo.
echo "17 es primo: " . (esPrimo(17) ? "Sí" : "No") . "<br>";

// Ejemplo de uso de mcd: máximo común divisor de 48 y 18.
echo "MCD(48,18) = " . mcd(48, 18) . "<br>";

// Ejemplo de uso de mcm: mínimo común múltiplo de 4 y 6.
echo "MCM(4,6) = "   . mcm(4, 6)   . "<br>";

// Preparamos un conjunto de datos para las estadísticas.
$datos = [1,2,3,4,5,6,7,8,9,10];

// Llamamos a la función estadistica y guardamos el resultado en un array.
$stats = estadistica($datos);

// Mostramos cada medida estadística por separado.
echo "Estadística sobre los datos 1..10:<br>";
echo "- Media: "      . $stats["media"]      . "<br>";
echo "- Mediana: "    . $stats["mediana"]    . "<br>";
echo "- Moda(s): "    . implode(", ", $stats["moda"]) . "<br>";
echo "- Varianza: "   . $stats["varianza"]   . "<br>";
echo "- Desviación: " . $stats["desviacion"] . "<br>";

?>

<?php

// ==========================================
// VARIABLES LOCALES Y GLOBALES EN PHP
// ==========================================

// $contador = 5; es una VARIABLE GLOBAL
// - Se crea FUERA de cualquier función
// - Puede ser accedida desde cualquier parte del script
// - Para MODIFICARla dentro de una función, debemos declarar "global $contador;"

$contador = 5;


// ==========================================
// FUNCIÓN: incrementar()
// ==========================================
// Esta función usa una variable GLOBAL ($contador)
// y la incrementa en 1 cada vez que se llama.

function incrementar() {
    global $contador;  // ← Declara que vamos a usar la variable GLOBAL $contador
                       // (sin esto, PHP crearía una variable LOCAL nueva)
    
    $contador++;       // ← Incrementa la variable global en 1 (5 → 6 → 7 → 8...)
    
    echo "Contador: $contador <br>";  // ← Muestra el valor actual del contador
}


// ==========================================
// LLAMADAS A incrementar()
// ==========================================
// Cada llamada incrementa $contador en 1:
// - 1ª llamada: 5 → 6
// - 2ª llamada: 6 → 7
// - 3ª llamada: 7 → 8
// - 4ª llamada: 8 → 9

incrementar();  // Contador: 6
incrementar();  // Contador: 7
incrementar();  // Contador: 8
incrementar();  // Contador: 9


// Mostrar el valor final de $contador (que ahora es 9)
echo $contador . "<br>";  // 9


// ==========================================
// VARIABLES ESTÁTICAS (static)
// ==========================================
// Una variable STATIC mantiene su valor entre llamadas a la función.
// Se declara dentro de la función, pero NO se reinicia cada vez.

function contarLlamadas(): int {
    static $veces = 0;   // ← VARIABLE ESTÁTICA
                         // - Se inicializa solo la PRIMERA vez que se entra en la función
                         // - Su valor se PRESERVA entre llamadas siguientes
    
    $veces++;            // ← Incrementa el valor de $veces en 1
    
    return $veces;       // ← Devuelve el valor actual de $veces
}                        // Tipo de retorno: int (entero)


// ==========================================
// LLAMADAS A contarLlamadas()
// ==========================================
// Cada llamada devuelve el número total de veces que se ha llamado:
// - 1ª llamada: $veces = 0 → 1 (devuelve 1)
// - 2ª llamada: $veces = 1 → 2 (devuelve 2)
// - 3ª llamada: $veces = 2 → 3 (devuelve 3)

echo contarLlamadas() . "<br>";  // 1
echo contarLlamadas() . "<br>";  // 2
echo contarLlamadas() . "<br>";  // 3


// ==========================================
// RESUMEN DE CONCEPTOS
// ==========================================

// VARIABLE LOCAL:
//   - Se crea dentro de una función
//   - Solo existe mientras la función se ejecuta
//   - No se puede acceder desde fuera de la función

// VARIABLE GLOBAL:
//   - Se crea FUERA de todas las funciones
//   - Puede ser accedida desde cualquier parte
//   - Para MODIFICARla dentro de una función, usar: global $nombre;

// VARIABLE ESTÁTICA (static):
//   - Se declara dentro de una función con "static"
//   - Su valor se PRESERVA entre llamadas (no se reinicia)
//   - Útil para contar llamadas, mantener estado, etc.

?>

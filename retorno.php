<?php

function calcularIMC (float $peso, float $altura) : float {
    return round($peso / ($altura ** 2), 2); 
    // $peso / ($altura ** 2);   
}

//con el return indicamos que la función devuelve un valor
//con el float indicamos que la función recibe un número con decimales
//con el : indicamos que la función devuelve un número con decimales
//con el , indicamos que la función devuelve un número con dos decimales
//en este caso práctico conse que la función devuelve un número con dos decimales

$imc = calcularIMC(70, 1.75);
echo "Tu IMC es: $imc <br>";

//llamamos a la función
//realizamos el cálculo del IMC
//imprimimos el IMC

function clasificarIMC (float $imc) : string {
    return match(true) {
        $imc < 18.5 => "Bajo peso",
        $imc < 25 => "Normal",
        $imc < 30 => "Sobrepeso",
        default => "Obesidad",
    };
}
//con $imc indicamos que la función recibe un IMC
//con el return indicamos que la función devuelve un valor
//con el string indicamos que la función devuelve un string
//con el : indicamos que la función devuelve un string
//en este caso práctico conse que la función devuelve un string
//con match(true) indicamos que la función devuelve un string

$clasificacion = clasificarIMC($imc);
echo "Tu clasificación es: $clasificacion <br>";

//llamamos a la función
//realizamos la clasificación del IMC
//imprimimos la clasificación

function dividir(int $a, int $b) : array{
    return [
        "cociente" => intdiv($a, $b),
        "resto" => $a % $b, 
    ];    
}

//con el return indicamos que la función devuelve un valor
//con el int indicamos que la función devuelve un número entero
//con el : indicamos que la función devuelve un número entero
//en este caso práctico conse que la función devuelve un número entero
//con match(true) indicamos que la función devuelve un número entero
//con la funcion intdiv indicamos que la función devuelve un número entero
//con la funcion % indicamos que la función devuelve un número entero   
//con la funcion [] indicamos que la función devuelve un array

$resultado= dividir(17, 5);
echo "Cociente:{$resultado ["cociente"]}, Resto: {$resultado ["resto"]}<br>";

//llamamos a la función
//realizamos la división
//imprimimos la división
?>
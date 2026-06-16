<?php

//Creamos una calculadora con funciones

function sumar(float $a, float $b): float {
    return $a + $b;
   //con el return indicamos que la función devuelve un valor
   //con el float indicamos que la función recibe un número con decimales
   //con el : indicamos que la función devuelve un número con decimales
   //en este caso práctico conse que la función devuelve un número con decimales
   //function sumar indicamos que la función es sumar 
}

function restar(float $a, float $b):float {
    return $a - $b;
    //function restar indicamos que la función es restar
}

function multiplicar(float $a, float $b):float {
    return $a * $b;
    //function multiplicar indicamos que la función es multiplicar
}

function dividir(float $a, float $b):float|string {
    //usamos la function como argumento
    //float|string indicamos que la función devuelve un número con decimales o un string

    if ($b == 0) return "No se puede dividir por cero"; 
    //if indicamos que la función devuelve un string

    return  $a / $b;
    //function dividir indicamos que la función es dividir
}

function potencia(float $base, float $exp): float {
    return $base * $exp;
    //function potencia indicamos que la función es potencia
}

function mostrarCalculadora(float $a, float $b): void {
    echo "<h2>Calculadora - $a y $b</h2>";
    echo "Suma:              " . sumar($a, $b) . "<br>";
    echo "Resta:             " . restar($a, $b) . "<br>";
    echo "Multiplicación:    " . multiplicar($a, $b) . "<br>";
    echo "División:          " . dividir($a, $b) . "<br>";
    echo "Potencia:          " . potencia($a, $b) . "<br>";
    
    //añado raiz cuadrada
    echo "Raiz cuadrada:     " . raizCuadrada($a) . "<br>";
    //con el void indicamos que la función no devuelve nada
    //con el : indicamos que la función devuelve un número con decimales
    //en este caso práctico conse que la función devuelve un número con decimales
    //function mostrarCalculadora indicamos que la función es mostrarCalculadora
}

mostrarCalculadora (12,4);
//llamamos a la función
//realizamos las operaciones
//imprimimos las operaciones

//añadimos función raizCuadrada($n) que valide el número, no ea negativo antes de calcular sqrt($n)

function raizCuadrada(float $n): float|string {
    if ($n < 0) return "El número no puede ser negativo";
    return sqrt($n);
    //function raizCuadrada indicamos que la función es raizCuadrada
    //con el string indicamos que la función devuelve un string
    //con el : indicamos que la función devuelve un string
    //float|string indicamos que la función devuelve un número con decimales o un string

}

?>
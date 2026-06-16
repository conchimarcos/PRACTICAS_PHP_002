<?php

//las arrow functions son funciones anonimas
//se utilizan para crear funciones en una sola linea


$cuadrado = function(int $n): int {
    return $n * $n;

    //con el return indicamos que la función devuelve un valor
    //con el int indicamos que la función devuelve un número entero
    //con el : indicamos que la función devuelve un número entero
    //function indicamos que la función es anonima
    //con el int indicamos que la función recibe un número entero

    };

    echo $cuadrado(5);
    echo "<br>";
    echo $cuadrado(10);
    echo "<br>";
    echo $cuadrado(20);
    echo "<br>";
    echo $cuadrado(30);
    echo "<br>";
    echo $cuadrado(40);
    echo "<br>";
    echo $cuadrado(50);
    echo "<br>";
    echo $cuadrado(60);
    echo "<br>";
    echo $cuadrado(70);
    echo "<br>";
    echo $cuadrado(80);
    echo "<br>";
    echo $cuadrado(90);
    echo "<br>";
    echo $cuadrado(100);

    //estamos llamando a la función
    //realizamos el cálculo del cuadrado
    //imprimimos el cuadrado
    //en este caso práctico estamos haciendo un cuadrado de diferentes números

$cubo = fn(int $n) => $n * $n * $n;
echo $cubo(5);
echo "<br>";
echo $cubo(10);
echo "<br>";
echo $cubo(20);
echo "<br>";
//en este caso práctico estamos haciendo un cubo de diferentes números
//arrow fn es una arrow function que nos sirve para crear funciones en una sola linea
//compactar el codigo
//fn equivale a function

$numeros = [3,1,4,1,5,9,2,6];
//usamos la funcion como argumento

$cuadrados = array_map(fn($n) => $n * $n, $numeros);
//array_map aplica función a cada elemento

$pares = array_filter($numeros, fn($n) => $n % 2 === 0);
//array_filter filtra elementos

usort($numeros, fn($a, $b) => $a - $b);
//usort ordena con función propia
?>

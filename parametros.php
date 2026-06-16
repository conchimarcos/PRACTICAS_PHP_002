<?php

function saludar (string $nombre, string $saludo = "Hola") : void{
    echo "<br>$saludo, $nombre!\n";

//con el string indicamos que la función recibe un string
//con el void indicamos que la función no devuelve nada
//con el return indicamos que la función devuelve un valor
}


saludar("Ricardo");
saludar("Ricardo", "Buenos días");

function calcularPrecio (float $precio, float $iva = 0.21) : float{
    return $precio * (1 + $iva);
//con el return indicamos que la función devuelve un valor
//con el float indicamos que la función recibe un número con decimales
}

echo calcularPrecio(100);
echo calcularPrecio(100, 0.10);

function suma(float...$numeros): float{
    return array_sum($numeros);
//con el return indicamos que la función devuelve un valor
//con el float indicamos que la función recibe un número con decimales  
//con el ... indicamos que la función recibe un número indefinido de argumentos
}

echo suma(1, 2, 3, 4, 5);

?>

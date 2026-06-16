// Ejemplo 3: local vs global con el mismo nombre
<?php
$mensaje = "Hola";  // global

function mostrar() {
    $mensaje = "Adiós";  // local (distinta de la global)
    echo "Local: $mensaje\n";
}

mostrar();
echo "Global: $mensaje\n";


//La variable local solo existe dentro de la función donde se declara.
//La variable global existe en todo el script.
//Si dentro de una función defines una variable con el mismo nombre que una global, la local prima dentro de esa función.
//Para usar la variable global dentro de una función, se usa global $nombre;.


?>
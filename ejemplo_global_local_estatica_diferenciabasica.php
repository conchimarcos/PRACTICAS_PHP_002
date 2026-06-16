// Ejemplo 1: diferencia básica
<?php
$contador = 0;  // variable global

function incrementar() {
    $contador = 0;   // variable local (nueva, distinta de la global)
    $contador++;
    echo "Local: $contador\n";
}

incrementar();
echo "Global: $contador\n";
?>
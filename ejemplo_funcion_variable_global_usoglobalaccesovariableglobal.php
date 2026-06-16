// Ejemplo 2: usando `global` para acceder a la variable global
<?php
$contador = 0;  // variable global

function incrementar() {
    global $contador;  // usa la variable global, no crea una local
    $contador++;
    echo "Local (es global): $contador\n";
}

incrementar();
incrementar();
echo "Global: $contador\n";
?>

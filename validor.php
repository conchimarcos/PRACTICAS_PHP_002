<?php

function validarNombre(string $nombre): string|false {
    //trim elimina los espacios en blanco
    //strlen devuelve el número de caracteres
    //preg_match devuelve true o false
    $nombre = trim($nombre);
    if (strlen($nombre) < 2 || strlen($nombre) > 50) return false;
    if (<!preg_match('/^[a-zA-Z\s]+$/u', $nombre)) return false;
    return ucwords(strtolower($nombre));
    //ucwords convierte la primera letra de cada palabra en mayúscula
    //strtolower convierte el texto en minúsculas
}

function validarEmail(string $email): bool {
    return filter_var(trim($email), FILTER_VALIDATE_EMAIL) !== false;
    //filter_var devuelve true o false
    //trim elimina los espacios en blanco
    //preg_match devuelve true o false
}

function validarTelefono(string $tel): string|false {
    $tel = preg_replace('/[\s\-\.]/', '', $tel);
    if (!preg_match('/^(\+34)?[6789]\d{8}$/', $tel)) return false;
    return $tel;
    //preg_match devuelve true o false
    //preg_replace elimina los espacios, guiones y puntos
}

function validarContrasena(string  $pass): array {
    $errores =[];
    if (strlen($pass) <8)  $errores[] = "Mínimo 8 caracteres";
    if (!preg_match('/[A-Z]/', $pass)) $errores[] = "Al menos una letra mayúscula";
    if (!preg_match('/[0-9]/', $pass)) $errores[] = "Al menos un número";
    if (!preg_match('/[!@#$%]/', $pass)) $errores[] = "Al menos un carácter especial";
    return $errores;
    //preg_match devuelve true o false
    //preg_replace elimina los espacios
}

//uso del validor
$nombre = validarNombre (" ana garcia ");
//para validar el nombre del usuario se usa el operador ternario

echo $nombre ? "Nombre $nombre": "Nombre no valido";


$errores = validarContrasena("abc");
//para validar contrasena se usa el operador ternario

foreach ($errores as $error) {
    //con foreach recorremos el array
    //devolvemos el error de la contrasena
        echo "<li>$error</li>";
    }

?>


<?php

function saludar() {
    echo "Hola ";
}

//creamos la funcion saludar
//mostramos el saludo

saludar();

//llamamos a la funcion

function mostrarFecha() {
    $fecha = date("d-m-Y");
    echo "Hoy es: $fecha";
}

//creamos la funcion mostrar fecha
//llamamos a la funcion
//mostramos la fecha

mostrarFecha();
?>
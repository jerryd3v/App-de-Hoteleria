<?php
// Aqui es donde establesco la conexion con la base de datos

$dominio = "localhost"; // establesco la direccion del servidor
$nombre_usuario= "root"; // establesco el usuario
$contraseña =""; // defino la contraseña
$baseDatos="hospedate"; // defino el nombre de la base de datos

// creo la conexion con la base de datos
$conexion=  new mysqli($dominio,$nombre_usuario,$contraseña,$baseDatos); 

?>
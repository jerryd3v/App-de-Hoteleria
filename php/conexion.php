<?php
// Aqui es donde establesco la conexion con la base de datos


$dominio = "localhost"; // guardo el servidor
$nombre_usuario= "root"; // guardo el usuario
$contraseña =""; // guardo la contraseña
$baseDatos="hospedate"; // guardo el nombre de la base de datos

$conexion=  new mysqli($dominio,$nombre_usuario,$contraseña,$baseDatos); // creo la conexion

?>
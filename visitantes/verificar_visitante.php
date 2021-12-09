<?php
include_once '../php/visitante.php';
$visitante= VISITANTE::obtener_id($_GET['cedula']);

// aqui verifico si la cedula fue encontrada en la base de datos

if($visitante){
    echo "<script>
    setTimeout(() => {
        window.location.href = \"ver_visitante.php?id=$visitante->id_visitante\";
    },0);
</script>";
// En caso de ser encontrada redirecciona a la pagina de ver visitante
 }
 else{
    echo " <div class=\"contenedor\" style=\" margin-top: 10em;
    color: #E63A40; display: flex; justify-content: center; \">
    <h1> Visitante no registrado en el sistema</h1>
        </div> ";
    echo "<script>
    setTimeout(() => {
        window.location.href = \"index.php\";
    },2000);
</script>";
// En caso de no ser enontrada redirecciona a la pagina de Visitantes
// luego de mandar un mensaje de error
 }


?>
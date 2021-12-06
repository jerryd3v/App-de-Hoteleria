<?php
include_once '../php/actividad.php';
$actividad = new ACTIVIDAD($_GET['id_actividad'],$_GET['frecuencia'],$_GET['tipo'],$_GET['descripcion'],$_GET['dificultad'],$_GET['gasto_extra'],$_GET['alojamiento']);
$actividad->guardar();
echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Actividad Registrada Con Exito!!!</h1>
                    </div> ";
?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
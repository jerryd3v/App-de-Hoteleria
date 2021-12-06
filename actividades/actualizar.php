<?php
include_once "../php/actividad.php";

$actividad = new ACTIVIDAD($_POST['id_actividad'],$_POST['frecuencia'],$_POST['tipo'],$_POST['descripcion'],$_POST['dificultad'],$_POST['gasto_extra'],$_POST['alojamiento']);

$actividad->actualizar();

echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Actividad Actualizado Con Exito!!!</h1>
                    </div> ";

?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
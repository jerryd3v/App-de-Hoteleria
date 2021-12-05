<?php
include_once "../php/asesor.php";

$asesor = new ASESOR($_POST['id_cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['direccion'], $_POST['alojamiento']);

$asesor->actualizar();

echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Asesor Actualizado Con Exito!!!</h1>
                    </div> ";

?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
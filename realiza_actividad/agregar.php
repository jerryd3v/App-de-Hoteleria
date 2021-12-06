<?php
include_once '../php/realizaActividad.php';
include_once '../php/visitante.php';

$visitante= VISITANTE::obtener_id($_GET['cedula']);

$realiza_actividad = new REALIZA_ACTIVIDAD($_GET['referencia'],$visitante->nombre.' '.$visitante->apellido,$visitante->id_visitante,$_GET['actividad'],$_GET['alojamiento'],$_GET['fecha']);
$realiza_actividad->guardar();
echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Usuario registrado en actividad Con Exito!!!</h1>
                    </div> ";
?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
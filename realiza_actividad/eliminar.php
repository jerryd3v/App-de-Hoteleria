<?php
include_once '../php/realizaActividad.php';

echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Registro Eliminado Con Exito!!!</h1>
                    </div> ";

REALIZA_ACTIVIDAD::eliminar($_GET['referencia']);

?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
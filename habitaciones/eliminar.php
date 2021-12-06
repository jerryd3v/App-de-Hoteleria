<?php
include_once '../php/habitacion.php';

echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Habitación Eliminada Con Exito!!!</h1>
                    </div> ";

HABITACION::eliminar($_GET['id_habitacion']);

?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
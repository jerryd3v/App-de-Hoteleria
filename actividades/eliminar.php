<?php
include_once '../php/actividad.php';

echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Actividad Eliminada Con Exito!!!</h1>
                    </div> ";

ACTIVIDAD::eliminar($_GET['id_actividad']);

?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
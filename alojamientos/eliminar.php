<?php
include_once '../php/alojamiento.php';

echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Alojamiento Eliminado Con Exito!!!</h1>
                    </div> ";

ALOJAMIENTO::eliminar($_GET['nombre']);

?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
<?php
include_once '../php/asesor.php';

echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Asesor Eliminado Con Exito!!!</h1>
                    </div> ";

ASESOR::eliminar($_GET['id_cedula']);

?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
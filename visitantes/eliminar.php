<?php
include_once '../php/visitante.php';

echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Visitante Eliminad@ Con Exito!!!</h1>
                    </div> ";

VISITANTE::eliminar($_GET['id']);

?>
<script>
    setTimeout(() => {
        window.location.href = "visitantes.php";
    }, 2000);
</script>

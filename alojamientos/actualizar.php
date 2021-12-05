<?php
include_once "../php/alojamiento.php";

$alojamiento = new ALOJAMIENTO($_POST['nombre'],$_POST['direccion'],$_POST['telefono']);

$alojamiento->actualizar();

echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Alojamiento Actualizado Con Exito!!!</h1>
                    </div> ";

?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
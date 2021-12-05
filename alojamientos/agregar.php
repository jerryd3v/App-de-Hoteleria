<?php
include_once '../php/alojamiento.php';
$alojamiento = new ALOJAMIENTO($_GET['nombre'],$_GET['direccion'],$_GET['telefono']);
$alojamiento->guardar();
echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Alojamiento Registrado Con Exito!!!</h1>
                    </div> ";
?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
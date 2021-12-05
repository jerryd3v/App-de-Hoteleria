<?php
include_once '../php/asesor.php';
$asesor = new ASESOR($_GET['id_cedula'],$_GET['nombre'],$_GET['apellido'],$_GET['direccion'],$_GET['alojamiento']);
$asesor->guardar();
echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Asesor Registrado Con Exito!!!</h1>
                    </div> ";
?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
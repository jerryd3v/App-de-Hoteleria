<?php
include_once '../php/habitacion.php';
$habitacion = new HABITACION($_GET['id_habitacion'],$_GET['precio'],$_GET['tipo'],$_GET['cuartos'],$_GET['baños'],$_GET['alojamiento']);
$habitacion->guardar();
echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Habitacion Registrada Con Exito!!!</h1>
                    </div> ";
?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
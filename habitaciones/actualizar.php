<?php
include_once "../php/habitacion.php";

$habitacion = new HABITACION($_POST['id_habitacion'],$_POST['precio'],$_POST['tipo'],$_POST['cuartos'],$_POST['baños'],$_POST['alojamiento']);

$habitacion->actualizar();

echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Habitacion Actualizada Con Exito!!!</h1>
                    </div> ";

?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>
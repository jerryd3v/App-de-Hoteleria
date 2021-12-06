<?php
include_once "../php/visitante.php";

$visitante = new VISITANTE($_POST['id_visitante'],$_POST['nombre'],$_POST['apellido'],$_POST['cedula'],$_POST['sexo'],$_POST['direccion'],$_POST['estado'],$_POST['telefono'],$_POST['fecha_nacimiento'],$_POST['alojamiento'],$_POST['habitacion']);

$visitante->actualizar();

echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Visitante Actualizado Con Exito!!!</h1>
                    </div> ";

?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>

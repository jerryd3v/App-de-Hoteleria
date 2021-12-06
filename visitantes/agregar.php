<?php
include_once '../php/visitante.php';
$visitante = new VISITANTE($_GET['id_visitante'],$_GET['nombre'],$_GET['apellido'],$_GET['cedula'],$_GET['sexo'],$_GET['direccion'],$_GET['estado'],$_GET['telefono'],$_GET['fecha_nacimiento'],$_GET['alojamiento'],$_GET['habitacion']);
$visitante->guardar();
echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                color: #00A441; display: flex; justify-content: center; \">
                <h1>Visitante Registrado Con Exito!!!</h1>
                    </div> ";
?>
<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
</script>

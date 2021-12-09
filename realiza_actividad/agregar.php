<?php
include_once '../php/realizaActividad.php';
include_once '../php/actividad.php';
include_once '../php/visitante.php';
$actividad = ACTIVIDAD::obtener_uno($_GET['actividad']);
$visitante= VISITANTE::obtener_id($_GET['cedula']);

// aqui verifico si la cedula fue obtenida correctamente
// tambien verifico si la actividad esta registrada en el alojamiento
if($actividad->alojamiento == $_GET['alojamiento'] && $visitante){
    
        $realiza_actividad = new REALIZA_ACTIVIDAD($_GET['referencia'],$visitante->nombre.' '.$visitante->apellido,$visitante->id_visitante,$_GET['actividad'],$_GET['alojamiento'],$_GET['fecha']);
        $realiza_actividad->guardar();
        echo " <div class=\"contenedor\" style=\" margin-top: 10em;
                    color: #00A441; display: flex; justify-content: center; \">
                    <h1>Usuario registrado en actividad Con Exito!!!</h1>
                        </div> ";
    
}else{
    // en caso de no encontrar el usuario
    if($visitante){}else{
        echo " <div class=\"contenedor\" style=\" margin-top: 10em;
        color: #E63A40; display: flex; justify-content: center; \">
        <h1>Usuario No encontrado, por favor digite correctamente la cedula</h1>
            </div> ";
    }
    // en caso de que la actividad no esta registrada en el alojamiento
    if($actividad->alojamiento == $_GET['alojamiento']){}else{
        echo " <div class=\"contenedor\" style=\" margin-top: 10em;
        color: #E63A40; display: flex; justify-content: center; \">
        <h1> Esta Actividad no esta registrada en el alojamiento</h1>
            </div> ";
    }
}


?>

<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 3000);
    // redirecciona la pagina
</script>
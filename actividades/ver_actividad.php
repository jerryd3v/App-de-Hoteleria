<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_ver.css">
    <link rel="stylesheet" href="estilos_menu_nav.css">
    <title>Ver Actividad | Hospedate</title>
</head>

<body>
    <header>
        <div class="titulo">
            <p><span>H</span>ospedate</p>
            <!--Menu Mobile-->
            <input class="d-none" type="checkbox" id="check">
            <label class="menu_label" for="check"><img id="icon_menu" src="../imagenes/bx-menu.svg" alt="menu"> <img id="icon_menu_x" src="../imagenes/bx-x.svg" alt="menu"></label>
            <div id="menu">
                <nav>
                    <ul>
                        <li><a href="../habitaciones/index.php"><span>H</span>abitaciones</a></li>
                        <li><a href="../alojamiento/index">Alojamientos</a></li>
                        <li><a href="../visitantes/index.php">Visitantes</a></li>
                        <li><a href="../asesores/index.php">Asesores</a></li>
                        <li><a href="index.php">Actividades</a></li>
                        <li><a href="../realiza_actividad/index.php">Actividades Realizadas</a></li>
                    </ul>
                    <p class="etiqueta_menu">by Jerry R.</p>
                </nav>
            </div>
        </div>
    </header>
    <?php
    include_once '../php/actividad.php';
    $actividad = ACTIVIDAD::obtener_uno($_GET['id_actividad']);

    ?>
    <!--php echo $alojamiento->nombre  echo $alojamiento->apellido-->

    <div class="contenedor_ver_visitante">

        <div class="caja_ver_visitante">
            <div class="broche"></div>
            <div class="datos">
                <h1 class="titulo_ver_visitante">Actividad</h1>
                <p>Nombre: <span><?php echo $_GET['id_actividad']  ?></span></p>
                <p>Tipo: <span><?php echo $actividad->tipo ?></span></p>
                <p>Gasto Extra:
                <span><?php echo $actividad->gasto_extra ?>$</span>
                </p>
                <p>Dificultad: <span><?php echo $actividad->dificultad ?></span></p>
                <p>Frecuencia: <span><?php echo $actividad->frecuencia ?></span></p>
                <p id="descripcion_titulo">Descripcion:</p>
                <p id="descripcion"><?php echo $actividad->descripcion ?></p>
                <p>Alojamiento: <span><a id="link" href="../alojamientos/ver_alojamiento.php?nombre=<?php echo $actividad->alojamiento?>"><?php echo $actividad->alojamiento ?></a></span></p>
                <div class="botones_ver">
                    <div class="eliminar_ver">
                        <a href="aviso_eliminar.php?id_actividad=<?php echo $_GET['id_actividad'] ?>">
                            Eliminar
                        </a>
                    </div>
                    <div class="ver_mas">
                        <a href="formulario_actualizar.php?id_actividad=<?php echo $_GET['id_actividad'] ?>">
                            Editar
                        </a>
                    </div>


                </div>
            </div>
        </div>
        <div class="regresar">
            <a href="index.php"> Regresar</a>
        </div>
    </div>
</body>

</html>
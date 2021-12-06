<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_asesor.css">
    <link rel="stylesheet" href="estilos_menu_nav.css">
    <title>Ver Asesor | Hospedate</title>
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
                        <li><a href="../alojamientos/index.php">Alojamientos</a></li>
                        <li><a href="../visitantes/index.php">Visitantes</a></li>
                        <li><a href="index.php">Asesores</a></li>
                        <li><a href="../actividades/index.php">Actividades</a></li>
                    </ul>
                    <p class="etiqueta_menu">by Jerry R.</p>
                </nav>
            </div>
        </div>
    </header>
    <?php 
    include_once '../php/asesor.php';
    $asesor = ASESOR::obtener_uno($_GET['id_cedula']);

    ?>
    <!--php echo $visitante->nombre  echo $visitante->apellido-->

    <div class="contenedor_ver_visitante">
        
        <div class="caja_ver_visitante">
            <div class="broche"></div>
            <div class="datos">
                <h1 class="titulo_ver_visitante">Asesor</h1>
                <p>Nombre: <span><?php echo $asesor->nombre?></span></p>
                <p>Apellido: <span><?php echo $asesor->apellido?></span></p>
                <p>Cedula: <span><?php echo $asesor->id_cedula?></span></p>
                <p>Direccion: <div class="direccion_ver"><p id="direccion_ver_p"><?php echo $asesor->direccion ?></p></div></p>
                <p>Alojamiento: <span><?php echo $asesor->alojamiento?></span></p>
                <div class="botones_ver">
                                        <div class="eliminar_ver">
                                            <a href="aviso_eliminar.php?id_cedula=<?php echo $_GET['id_cedula']?>&nombre=<?php echo $asesor->nombre ?>&apellido=<?php echo $asesor->apellido ?>">
                                                Eliminar
                                            </a>
                                        </div>
                                        <div class="ver_mas">
                                            <a href="formulario_actualizar.php?id_cedula=<?php echo $asesor->id_cedula ?>">
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
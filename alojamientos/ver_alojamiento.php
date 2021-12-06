<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_alojamientos.css">
    <link rel="stylesheet" href="estilos_menu_nav.css">
    <title>Ver Alojamientos | Hospedate</title>
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
                        <li><a href="index.php">Alojamientos</a></li>
                        <li><a href="../visitantes/index.php">Visitantes</a></li>
                        <li><a href="../asesores/index.php">Asesores</a></li>
                        <li><a href="../actividades/index.php">Actividades</a></li>
                        <li><a href="../realiza_actividad/index.php">Actividades Realizadas</a></li>
                    </ul>
                    <p class="etiqueta_menu">by Jerry R.</p>
                </nav>
            </div>
        </div>
    </header>
    <?php 
    include_once '../php/alojamiento.php';
    $alojamiento = ALOJAMIENTO::obtener_uno($_GET['nombre']);

    ?>
    <!--php echo $alojamiento->nombre  echo $alojamiento->apellido-->

    <div class="contenedor_ver_visitante">
        
        <div class="caja_ver_visitante">
            <div class="broche"></div>
            <div class="datos">
                <h1 class="titulo_ver_visitante">Alojamiento</h1>
                <p>Nombre: <span><?php echo $_GET['nombre']?></span></p>
                <p>Direccion: <div class="direccion_ver"><p id="direccion_ver_p"><?php echo $alojamiento->direccion?></p></div></p>
                <p>Teléfono: <span><?php echo $alojamiento->telefono?></span></p>
                <div class="botones_ver">
                                        <div class="eliminar_ver">
                                            <a href="aviso_eliminar.php?nombre=<?php echo $_GET['nombre']?>">
                                                Eliminar
                                            </a>
                                        </div>
                                        <div class="ver_mas">
                                            <a href="formulario_actualizar.php?nombre=<?php echo $_GET['nombre'] ?>">
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
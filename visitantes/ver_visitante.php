<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_visitantes.css">
    <link rel="stylesheet" href="estilos_menu_nav.css">
    <title>Ver Visitante | Hospedate</title>
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
                        <li><a href="index.php">Visitantes</a></li>
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
    include_once '../php/visitante.php';
    $visitante = VISITANTE::obtener_uno($_GET['id']);
    ?>
    <!--php echo $visitante->nombre  echo $visitante->apellido-->

    <div class="contenedor_ver_visitante">
        
        <div class="caja_ver_visitante">
            <div class="broche"></div>
            <div class="datos">
                <h1 class="titulo_ver_visitante">Visitante</h1>
                <p>Nombre: <span><?php echo $visitante->nombre?></span></p>
                <p>Apellido: <span><?php echo $visitante->apellido?></span></p>
                <p>Cedula: <span><?php echo $visitante->cedula?></span></p>
                <p>Sexo: <span><?php echo $visitante->sexo?></span></p>
                <p>Direccion: <div class="direccion_ver"><p id="direccion_ver_p"><?php echo $visitante->direccion?></p></div></p>
                <p>Estado: <span><?php echo $visitante->estado?></span></p>
                <p>Teléfono: <span><?php echo $visitante->telefono?></span></p>
                <p>Fecha de Nacimiento: <span><?php echo $visitante->fecha_nacimiento?></span></p>
                <p>Alojamiento: <span><a id="link" href="../alojamientos/ver_alojamiento.php?nombre=<?php echo $visitante->alojamiento?>"><?php echo $visitante->alojamiento?></a></span></p>
                <p> Habitación: <span><a id="link" href="../habitaciones/ver_habitacion.php?id_habitacion=<?php echo $visitante->habitacion?>"><?php echo $visitante->habitacion?></a></span></p>
                
                <div class="botones_ver">
                                        <div class="eliminar_ver">
                                            <a href="aviso_eliminar.php?id=<?php echo $_GET['id']?>&nombre=<?php echo $visitante->nombre ?>&apellido=<?php echo $visitante->apellido ?>">
                                                Eliminar
                                            </a>
                                        </div>
                                        <div class="ver_mas">
                                            <a href="formulario_actualizar.php?id=<?php echo $visitante->id_visitante ?>">
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
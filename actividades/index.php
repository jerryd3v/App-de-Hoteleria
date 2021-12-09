<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_actividades.css">
    <link rel="stylesheet" href="estilos_menu_nav.css">
    <title>Actividades | Hospedate</title>
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
                        <li><a href="../asesores/index.php">Asesores</a></li>
                        <li><a href="../realiza_actividad/index.php">Actividades Realizadas</a></li>
                    </ul>
                    <p class="etiqueta_menu">by Jerry R.</p>
                </nav>
            </div>
            <a class="agregar_actividad" href="formulario_actividad.php">Agregar</a>
        </div>
    </header>
    <?php
    include_once '../php/actividad.php';
    $actividades = ACTIVIDAD::obtener_todo();

    ?>
<main>
        <h1 class="sub_titulo">Actividades</h1>
        <div class="contenedor_caja">

            <?php foreach ($actividades as $actividad) { ?>
                <div class="caja">
                    <span class="circulo"></span>
                    <h1><?php echo $actividad["id_actividad"] ?></h1>
                    <div class="caracteristicas_habita">
                        <div class="alojamiento_caja">
                            <h3>Alojamiento: <span class="alojamiento"><a id="link" href="../alojamientos/ver_alojamiento.php?nombre=<?php echo $actividad['alojamiento']?>"><?php echo $actividad["alojamiento"] ?></a></span></h3>
                        </div>
                        <div class="precio_caja">
                            <h3>Frecuencia: <span class="frecuencia"><?php echo $actividad["frecuencia"] ?></span></h3>
                        </div>
                        <div class="tipo_habita_caja">
                            <h3 class="tipo">Tipo: <span><?php echo $actividad["tipo"] ?></span></h3>
                        </div>
                        <div class="banos_caja">
                            <h3 class="banos">Dificultad: <span><?php echo $actividad["dificultad"] ?></span></h3>
                        </div>
                        <div class="botones">
                            <div class="eliminar">
                                <a href="aviso_eliminar.php?id_actividad=<?php echo $actividad["id_actividad"] ?>">
                                    Eliminar
                                </a>
                            </div>
                            <div class="ver_mas">
                                <a href="ver_actividad.php?id_actividad=<?php echo $actividad["id_actividad"] ?>">
                                    Ver más
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
    <footer>

        <script src="menu.js" language="Javascript"></script>
    </footer>
</body>

</html>
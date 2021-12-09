<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospedate | Jerry R.</title>
    <link rel="shortcut icon" href="../imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_habitacion.css">
    <link rel="stylesheet" href="estilos_menu_nav.css">

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
                        <li><a href="../alojamientos/index.php"><span>A</span>lojamientos</a></li>
                        <li><a href="../visitantes/index.php">Visitantes</a></li>
                        <li><a href="../asesores/index.php">Asesores</a></li>
                        <li><a href="../actividades/index.php">Actividades</a></li>
                        <li><a href="../realiza_actividad/index.php">Actividades Realizadas</a></li>
                    </ul>
                    <p class="etiqueta_menu">by Jerry R.</p>
                </nav>
            </div>
            <a class="agregar_habita" href="formulario_habitacion.php">Agregar</a>
        </div>
    </header>
    <?php
    include_once '../php/habitacion.php';
    $habitaciones = HABITACION::obtener_todo();
    ?>
    <main>
        <h1 class="sub_titulo">Habitaciones</h1>
        <div class="contenedor_caja">

            <?php foreach ($habitaciones as $habitacion) { ?>
                <div class="caja">
                    <span class="circulo"></span>
                    <h1><?php echo $habitacion["id_habitacion"] ?></h1>
                    <div class="caracteristicas_habita">
                        <div class="alojamiento_caja">
                            <h3>Alojamiento: <a id="link" href="../alojamientos/ver_alojamiento.php?nombre=<?php echo $habitacion['alojamiento']?>"><span class="alojamiento"><?php echo $habitacion["alojamiento"] ?></a></span></h3>
                        </div>
                        <div class="precio_caja">
                            <h3>Precio: <span class="precio"><?php echo $habitacion["precio"] ?>$</span></h3>
                        </div>
                        <div class="tipo_habita_caja">
                            <h3 class="tipo">Tipo: <span><?php echo $habitacion["tipo"] ?></span></h3>
                        </div>
                        <div class="banos_caja">
                            <h3 class="banos">Baños: <span><?php echo $habitacion["baños"] ?></span></h3>
                        </div>
                        <div class="botones">
                            <div class="eliminar">
                                <a href="aviso_eliminar.php?id_habitacion=<?php echo $habitacion["id_habitacion"] ?>">
                                    Eliminar
                                </a>
                            </div>
                            <div class="ver_mas">
                                <a href="ver_habitacion.php?id_habitacion=<?php echo $habitacion["id_habitacion"] ?>">
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
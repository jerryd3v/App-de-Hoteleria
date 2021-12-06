<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_realizaActividad.css">
    <link rel="stylesheet" href="estilos_menu_nav.css">
    <title>Actividades Inscritas | Hospedate</title>
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
                        <li><a href="../actividades/index.php">Actividades</a></li>
                    </ul>
                    <p class="etiqueta_menu">by Jerry R.</p>
                </nav>
            </div>
            <a class="agregar_realiza_actividad" href="formulario_realiza_actividad.php">Agregar</a>
        </div>
    </header>
    <?php
    include_once '../php/realizaActividad.php';
    $realiza_actividades = REALIZA_ACTIVIDAD::obtener_todo();

    ?>
<main>
<h1 class="sub_titulo">Actividades Realizadas</h1>
        <div class="contenedor">
            <div class="caja_tabla">
                <table>
                    <thead>
                        <tr>
                            <th>Actividad</th>
                            <th>Visitante</th>
                            <th>ID Visitante</th>
                            <th>Referencia</th>
                            <th>Alojamiento</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($realiza_actividades as $realiza_actividad) { ?>
                            <tr>
                                <td><a href="../actividades/ver_actividad.php?id_actividad=<?php echo $realiza_actividad['id_actividad']?>"><?php echo $realiza_actividad["id_actividad"] ?></a></td>
                                <td><a href="../visitantes/ver_visitante.php?id=<?php echo $realiza_actividad['id_visitante']?>"><?php echo $realiza_actividad["nombre_apellido_visitante"] ?></a></td>
                                <td>#<?php echo $realiza_actividad["id_visitante"] ?></td>
                                <td><p>#<?php echo $realiza_actividad["referencia"] ?></p></td>
                                <td><a href="../alojamientos/ver_alojamiento.php?nombre=<?php echo $realiza_actividad['alojamiento']?>"><?php echo $realiza_actividad["alojamiento"] ?></a></td>
                                <td><p><?php echo $realiza_actividad["fecha"] ?></p></td>
                                <td>
                                    <div class="botones">
                                        <div class="eliminar">
                                            <a href="aviso_eliminar.php?referencia=<?php echo $realiza_actividad["referencia"] ?>&nombre=<?php echo $realiza_actividad["nombre_apellido_visitante"]?>&fecha=<?php echo $realiza_actividad["fecha"]?>&actividad=<?php echo $realiza_actividad["id_actividad"]?>">
                                                Eliminar
                                            </a>
                                        </div>
                        


                                    </div>

                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer>

        <script src="menu.js" language="Javascript"></script>
    </footer>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospedate | Jerry R.</title>
    <link rel="shortcut icon" href="../imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_visitantes.css">
    <link rel="stylesheet" href="estilos_menu_nav.css">
</head>

<body>
    <?php
    include_once "../php/visitante.php";
    $visitantes = VISITANTE::obtener_todo();
    ?>
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
                        <li><a href="../asesores/index.php">Asesores</a></li>
                        <li><a href="../actividades/index.php">Actividades</a></li>
                    </ul>
                    <p class="etiqueta_menu">by Jerry R.</p>
                </nav>
            </div>
            <a class="agregar_visitante" href="formulario_visitante.php">Agregar</a>
        </div>
    </header>
    <main>
        <h1 class="sub_titulo">Visitantes</h1>
        <div class="contenedor">
            <div class="caja_tabla">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cedula</th>
                            <th>Teléfono</th>
                            <th>Alojamiento</th>
                            <th>Habitación</th>
                            <th>Modificar</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($visitantes as $visitante) { ?>
                            <tr>
                                <td><?php echo $visitante["nombre"] ?></td>
                                <td><?php echo $visitante["apellido"] ?></td>
                                <td><?php echo $visitante["cedula"] ?></td>
                                <td><?php echo $visitante["telefono"] ?></td>
                                <td><?php echo $visitante["alojamiento"] ?></td>
                                <td><?php echo $visitante["habitacion"] ?></td>
                                <td>
                                    <div class="botones">
                                        <div class="eliminar">
                                            <a href="aviso_eliminar.php?id=<?php echo $visitante["id_visitante"] ?>&nombre=<?php echo $visitante["nombre"] ?>&apellido=<?php echo $visitante["apellido"] ?>">
                                                Eliminar
                                            </a>
                                        </div>
                                        <div class="ver_mas">
                                            <a href="ver_visitante.php?id=<?php echo $visitante["id_visitante"] ?>">
                                                Ver más
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

    </footer>
    <script type="text/javascript" src=" menu.js"></script>
</body>

</html>
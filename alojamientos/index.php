<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alojamientos | Jerry R.</title>
    <link rel="shortcut icon" href="../imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_alojamientos.css">
    <link rel="stylesheet" href="estilos_menu_nav.css">
</head>

<body>
    <header>
        <div class="titulo">
            <p><span>H</span>ospedate</p>
            <!--Menu Mobile-->
            <input class="d-none" type="checkbox" id="check">
            <label class="menu_label" for="check"><img id="icon_menu" src="../imagenes/bx-menu.svg" alt="menu"> <img
                    id="icon_menu_x" src="../imagenes/bx-x.svg" alt="menu"></label>
            <div id="menu">
                <nav>
                    <ul>
                        <li><a href="../habitaciones/index.php"><span>H</span>abitaciones</a></li>
                        <li><a href="index.php">Alojamientos</a></li>
                        <li><a href="../visitantes/visitantes.php">Visitantes</a></li>
                        <li><a href="../asesores/index.php">Asesores</a></li>
                        <li><a href="#">Actividades</a></li>
                    </ul>
                    <p class="etiqueta_menu">by Jerry R.</p>
                </nav>
            </div>
            <a class="agregar_visitante" href="formulario_alojamiento.php">Agregar</a>
        </div>
    </header>
    <?php 
    include_once "../php/alojamiento.php";
    $alojamientos = ALOJAMIENTO::obtener_todo();
    ?>
    <main>
    <h1 class="sub_titulo">Alojamientos</h1>
        <div class="contenedor">
            <div class="caja_tabla">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre de Alojamiento</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($alojamientos as $alojamiento) { ?>
                            <tr>
                                <td><?php echo $alojamiento["nombre"] ?></td>
                                <td><?php echo $alojamiento["telefono"] ?></td>
                                <td><?php echo $alojamiento["direccion"] ?></td>
                                <td>
                                    <div class="botones">
                                        <div class="eliminar">
                                            <a href="aviso_eliminar.php?nombre=<?php echo $alojamiento["nombre"] ?>">
                                                Eliminar
                                            </a>
                                        </div>
                                        <div class="ver_mas">
                                            <a href="ver_alojamiento.php?nombre=<?php echo $alojamiento["nombre"] ?>">
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
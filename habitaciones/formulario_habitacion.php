<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Habitación | Hospedate</title>
    <link rel="shortcut icon" href="../imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_habitacion.css">
    <link rel="stylesheet" href="estilos_menu_nav.css">
</head>

<body id="form_visitante">
    <header>
        <div class="titulo">
            <p><span>H</span>ospedate</p>
            <!--Menu Mobile-->
            <input class="d-none" type="checkbox" id="check">
            <label class="menu_label" for="check"><img id="icon_menu" src="../imagenes/bx-menu.svg" alt="menu"> <img id="icon_menu_x" src="../imagenes/bx-x.svg" alt="menu"></label>
            <div id="menu">
                <nav>
                    <ul>
                        <li><a href="index.php"><span>H</span>abitaciones</a></li>
                        <li><a href="../alojamientos/index.php">Alojamientos</a></li>
                        <li><a href="../visitantes/index.php">Visitantes</a></li>
                        <li><a href="../asesores/index.php">Asesores</a></li>
                        <li><a href="../actividades/index.php">Actividades</a></li>
                        <li><a href="../realiza_actividad/index.php">Actividades Realizadas</a></li>
                    </ul>
                    <p class="etiqueta_menu">by Jerry R.</p>
                </nav>
            </div>
            <div class="regresar_form">
                <a href="index.php"> Regresar</a>
            </div>
        </div>
    </header>
    <div class="contenedor_registro">
        <div class="caja_titulo_form">
            <h1 class="titulo_form">Registrar Habitaciones</h1>
        </div>
        <?php 
        include_once '../php/alojamiento.php';
        $alojamientos = ALOJAMIENTO::obtener_todo();
        ?>

        <!--Formulario-->
        <form action="agregar.php" class="agregar_visitante_form">
            <div class="grupo_1">
                <label for="id_habitacion">Nombre:</label>
                <input class="id_habitacion input_form" type="text" placeholder="Ingrese el Nombre" name="id_habitacion" required>

                <label for="precio">Precio:</label>
                <input id="precio" class="precio input_form" type="text" placeholder="Precio" name="precio" required>



            </div>
            <div class="grupo_2">
                <span class="span_alojamiento">Elige un Tipo: </span><select name="tipo">
                    <option value="">Elije uno</option>
                    <option>Individual</option>
                    <option>Doble</option>
                    <option>Triple</option>
                    <option>Quad</option>
                    <option>Queen</option>
                    <option>King</option>
                    <option>Doble-Doble</option>
                    <option>Suite</option>
                    <option>Suite Ejecutiva</option>
                    <option>Suite Presidencial</option>
                    <option>Apartamento</option>
                    <option>Cabaña</option>
                    <option>Piso Ejecutivo</option>
                </select>

                <label class="baños_label" for="baños">Baños:</label>
                <input id="baños" class="baños input_form" type="text" placeholder="Baños" name="baños" required>
            </div>

            <div class="grupo_3">
                <label for="cuartos">Cuartos:</label>
                <input id="cuartos" class="apellido input_form" type="text" placeholder="Cantidad de cuartos" name="cuartos" required>

                <span class="span_alojamiento">Elige un Alojamiento: </span><select name="alojamiento">
                    <option value="">Elije uno</option>
                    <?php foreach ($alojamientos as $alojamiento) { ?>                   
                        <option> <?php echo $alojamiento['nombre']?></option>
                    <?php } ?>
                </select>

            </div>
            <div class="botones_form">
                <button type="reset" class="cancelar_form">Limpiar</a>
                    <button type="submit" class="aceptar_form">Registrar</a>
            </div>

        </form>
    </div>

    <script type="text/javascript" src=" menu.js"></script>
</body>

</html>
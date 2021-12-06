<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Actividad Realizada | H</title>
    <link rel="shortcut icon" href="../imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_realizaActividad.css">
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
                        <li><a href="../habitaciones/index.php"><span>H</span>abitaciones</a></li>
                        <li><a href="../alojamientos/index.php">Alojamientos</a></li>
                        <li><a href="index.php">Visitantes</a></li>
                        <li><a href="../asesores/index.php">Asesores</a></li>
                        <li><a href="../actividades/index.php">Actividades</a></li>
                        <li><a href="index.php">Actividades Realizadas</a></li>
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
            <h1 class="titulo_form">Registrar Visitante En Actividad</h1>
        </div>
        <?php
        include_once '../php/alojamiento.php'; // importo alojamiento para poder usaro en el formulario, en el apartado de seleccion
        include_once '../php/visitante.php';// importo habitacion con el mismo objetivo que alojamiento
        include_once '../php/actividad.php';// importo habitacion con el mismo objetivo que alojamiento

        $alojamientos= ALOJAMIENTO::obtener_todo(); // aguardo el metodo estatico
        $actividades= ACTIVIDAD::obtener_todo();
        ?>
        <!--Formulario-->
        <form action="agregar.php" class="agregar_visitante_form">
            <div class="grupo_1">
                <label for="id_visitante">Cedula Visitante:</label>
                <input class="id_visitante input_form" type="text" placeholder="Ingrese Cedula" name="cedula" required>

                <label for="nombre">Numero REF#:</label>
                <input id="nombre" class="nombre input_form" type="text" placeholder="Referencia" name="referencia" required>
            </div>
            <div class="grupo_2">
                <label for="fecha">Fecha de Registro:</label>
                <input id="fecha" class="fecha input_form" type="date" placeholder="fecha" name="fecha" required>
            </div>

            <div class="grupo_3">
            </div>
            <div class="grupo_4">
            <span class="span_estado">Elige una Actividad: </span><select name="actividad">
                <option value="">Elige una</option>
                <?php foreach ($actividades as $actividad) { ?>                   
                    <option> <?php echo $actividad['id_actividad']?></option>
                <?php } ?>
            </select>
            <span class="span_alojamiento">Elige un alojamineto: </span><select name="alojamiento">
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Visitante | Hospedate</title>
    <link rel="shortcut icon" href="../imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_visitantes.css">
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
            <h1 class="titulo_form">Registrar Visitante</h1>
        </div>
        <?php
        include_once '../php/alojamiento.php'; // importo alojamiento para poder usaro en el formulario, en el apartado de seleccion
        include_once '../php/habitacion.php';// importo habitacion con el mismo objetivo que alojamiento

        $alojamientos= ALOJAMIENTO::obtener_todo(); // aguardo el metodo estatico
        $habitaciones= HABITACION::obtener_todo();

        ?>
        <!--Formulario-->
        <form action="agregar.php" class="agregar_visitante_form">
            <div class="grupo_1">
                <label for="id_visitante">ID Visitante:</label>
                <input class="id_visitante input_form" type="text" placeholder="Ingrese ID" name="id_visitante" required>

                <label for="nombre">Nombre:</label>
                <input id="nombre" class="nombre input_form" type="text" placeholder="Nombre" name="nombre" required>
                <label for="apellido">Apellido:</label>
                <input id="apellido" class="apellido input_form" type="text" placeholder="Apellido" name="apellido" required>
            </div>
            <div class="grupo_2">
                <label for="cedula">Cedula:</label>
                <input id="cedula" class="cedula input_form" type="text" placeholder="Cedula" name="cedula" required>
                <label for="telefono">Teléfono:</label>
                <input id="telefono" class="telefono input_form" type="text" placeholder="Telefono" name="telefono" required>
                <label for="fecha">Fecha de Nacimiento:</label>
                <input id="fecha" class="fecha input_form" type="date" placeholder="Telefono" name="fecha_nacimiento" required>
            </div>

            <div class="grupo_3">
                <label for="direccion_for">Direccion</label>
                <input name="direccion" id="direccion_for" class=" input_form" placeholder="Direccion">

                <span class="span_sexo">Genero: </span><select name="sexo">
                <option value="">Elige uno</option>
                <option>Femenino</option>
                <option>Masculino</option>
            </select>
            </div>
            <div class="grupo_4">
            <span class="span_estado">Elige un estado: </span><select name="estado">
                <option value="">Elige uno</option>
                <option>Miranda</option>
                <option>Distrito Federal</option>
                <option>Anzoátegui</option>
                <option>Zulia</option>
                <option>Amazonas</option>
                <option>Bolívar</option>
                <option>Táchira</option>
                <option>Mérida</option>
                <option>Delta Amacuro</option>
                <option>Yaracuy</option>
                <option>Guarico</option>
                <option>Aragua</option>
                <option>Apure</option>
                <option>Carabobo</option>
                <option>Barinas</option>
                <option>Vargas</option>
                <option>Nueva Esparta</option>
                <option>Trujillo</option>
                <option>Cojedes</option>
                <option>Lara</option>
                <option>Monagas</option>
                <option>Portuguesa</option>
                <option>Falcón</option>
            </select>
            <span class="span_alojamiento">Elige un alojamineto: </span><select name="alojamiento">
                <option value="">Elije uno</option>
                <?php foreach ($alojamientos as $alojamiento) { ?>                   
                    <option> <?php echo $alojamiento['nombre']?></option>
                <?php } ?>
            </select>
            <span class="span_habitacion">Elige una habitacion: </span><select name="habitacion">
                <option value="">Elije una</option>
                <?php foreach ($habitaciones as $habitacion) { ?>                   
                        <option> <?php echo $habitacion['id_habitacion']?></option>
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
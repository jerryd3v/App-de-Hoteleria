<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Asesor | Hospedate</title>
    <link rel="shortcut icon" href="../imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_asesor.css">
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
                        <li><a href="../visitantes/visitantes.php">Visitantes</a></li>
                        <li><a href="index.php">Asesores</a></li>
                        <li><a href="#">Actividades</a></li>
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
            <h1 class="titulo_form">Registrar Asesor</h1>
        </div>

        <!--Formulario-->
        <form action="agregar.php" class="agregar_visitante_form">
            <div class="grupo_1">
                <label for="nombre">Nombre:</label>
                <input class="nombre input_form" type="text" placeholder="Nombre" name="nombre" required>

                <label for="apellido">Apellido:</label>
                <input id="apellido" class="nombre input_form" type="text" placeholder="Apellido" name="apellido" required>
                <label for="cedula">Cedula:</label>
                <input id="cedula" class="apellido input_form" type="text" placeholder="Cedula" name="id_cedula" required>
            </div>
            <div class="grupo_2">
            <span class="span_alojamiento">Elige un alojamineto: </span><select name="alojamiento">
                <option value="">Elije uno</option>
                <option>AB Beach Hotel</option>
                <option>los cocos</option>
                <option>playota</option>
                <option>pantaleta</option>
            </select>
                
                <label id="label_direccion" for="direccion_for">Direccion</label>
                <input name="direccion" id="direccion_for" class=" input_form" placeholder="Direccion">
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
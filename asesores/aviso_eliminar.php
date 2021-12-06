<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Asesor | Hospedate</title>
    <link rel="shortcut icon" href="imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_menu_nav.css">
    <link rel="stylesheet" href="estilos_eliminar.css">
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
                        <li><a href="index.php">Asesores</a></li>
                        <li><a href="../actividades/index.php">Actividades</a></li>
                        <li><a href="../realiza_actividad/index.php">Actividades Realizadas</a></li>
                    </ul>
                    <p class="etiqueta_menu">by Jerry R.</p>
                </nav>
            </div>
        </div>
    </header>
    <div class="contenedor">
        <div class="caja">
            <img class="aviso" src="../imagenes/aviso.svg" alt="aviso-imagen" title="Aviso">
            <div class="habitacion">
                <h2>Nombre: <span><?php echo $_GET['nombre'] ?></span></h2>
                <h2>Apellido: <span><?php echo $_GET['apellido'] ?></span></h2>
            </div>
            <h2 class="titulo_eliminar">¿Esta seguro que desea Eliminar este Asesor?</h2>
            <h3 class="sub_titulo">Esta operacion es irreversible <img class="emoji" title="Triste" src="../imagenes/emoji.png"></p>
                <div class="botones">
                    <a class="cancelar" href="index.php">Cancelar</a>
                    <a class="eliminar" href="eliminar.php?id_cedula=<?php echo $_GET['id_cedula'] ?>">Eliminar</a>
                </div>
        </div>

    </div>
    <script type="text/javascript" src=" menu.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospedate | Jerry R.</title>
    <link rel="shortcut icon" href="imagenes/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="estilos_home.css">
    <link rel="stylesheet" href="estilos_menu_nav.css">
</head>

<body>
    <header>
        <div class="titulo">
            <p><span>H</span>ospedate</p>
            <!--Menu Mobile-->
            <input class="d-none" type="checkbox" id="check">
            <label class="menu_label" for="check"><img id="icon_menu" src="imagenes/bx-menu.svg" alt="menu"> <img
                    id="icon_menu_x" src="imagenes/bx-x.svg" alt="menu"></label>
            <div id="menu">
                <nav>
                    <ul>
                        <li><a href="index.php"><span>H</span>abitaciones</a></li>
                        <li><a href="alojamientos\alojamientos.php">Alojamientos</a></li>
                        <li><a href="visitantes\visitantes.php">Visitantes</a></li>
                        <li><a href="#">Asesores</a></li>
                        <li><a href="#">Actividades</a></li>
                    </ul>
                    <p class="etiqueta_menu">by Jerry R.</p>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <h1 class="sub_titulo">Habitaciones</h1>
        <div class="contenedor_caja">
        
        <?php

    $dominio = "localhost"; // guardo el servidor
    $nombre_usuario= "root"; // guardo el usuario
    $contraseña =""; // guardo la contraseña
    $baseDatos="hospedate"; // guardo el nombre de la base de datos

    $conexion=  mysqli_connect($dominio,$nombre_usuario,$contraseña,$baseDatos); // creo la conexion

    if($conexion->connect_error){ // verifico si la conexion es exitosa
        die($conexion->connect_error);
    }else{
        $tabla_habitacion= "SELECT * FROM habitacion";// Selecciono la tabla
        $habitacion_query = $conexion->query($tabla_habitacion);// creo una query para la tabla

        $tabla_visitante= "SELECT * FROM visitante";// Selecciono la tabla
        $visitante_query = $conexion->query($tabla_visitante);// creo una query para la tabla
        $fila_visita = $visitante_query->fetch_assoc();

        $tabla_asesor= "SELECT * FROM asesor";// Selecciono la tabla
        $asesor_query = $conexion->query($tabla_asesor);// creo una query para la tabla
        $fila_asesor = $asesor_query->fetch_assoc();

        if($habitacion_query->num_rows > 0){// aqui verifico si la tabla habitacion esta vacia
            while($fila_habita = $habitacion_query->fetch_assoc()){
                $contador= 0;
                echo "<div class=\"caja\">
                            <span class=\"circulo\"></span>
                            <h1>{$fila_habita["id_habitacion"]}</h1>
                            <div class=\"personas\">
                                <div class=\"visitantes\">
                                    <h3>Visitante</h3>
                                    <p>{$fila_visita["nombre"]} {$fila_visita["apellido"]}</p>
                                    <div class=\"contacto_visitante\">
                                        <p>Telefono: <span>{$fila_visita["telefono"]}</span></p>
                                    </div>
                                </div>
                                <div class=\"asesor\">
                                    <h3>Asesor</h3>
                                    <p>{$fila_asesor["nombre"]} {$fila_asesor["apellido"]}</p>
                                </div>
                                <div class=\"botones\">
                                    <div class=\"eliminar\">
                                        <a href=\"#\">Eliminar</a>
                                    </div>
                                    <div class=\"ver_mas\">
                                        <a href=\"#\">Ver más</a>
                                    </div>
                            </div>
                        </div>
                        </div>";
            $contador++;
            }
        }

    }
    exit(1);


?>
        </div>
    </main>
    <footer>

    </footer>
    <?php
    echo "<script type=\"text/javascript\" src=\" menu.js\">
    </script>";
    ?>
</body>

</html>
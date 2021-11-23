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
                        <li><a href="../index.php"><span>H</span>abitaciones</a></li>
                        <li><a href="../alojamientos/alojamientos.php">Alojamientos</a></li>
                        <li><a href="visitantes.php">Visitantes</a></li>
                        <li><a href="#">Asesores</a></li>
                        <li><a href="#">Actividades</a></li>
                    </ul>
                    <p class="etiqueta_menu">by Jerry R.</p>
                </nav>
            </div>
        </div>
    </header>
    <main>
    <h1 class="sub_titulo">Visitantes</h1>
        <div class="contenedor">
            <div class="caja_tabla">
                <table>
                    <thead>
                        <tr>
                            <th>ID Visitante</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cedula</th>
                            <th>Sexo</th>
                            <th>Direccion</th>
                            <th>Estado</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Alojamiento</th>
                            <th>Habitacion</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                             $dominio = "localhost"; // guardo el servidor
                            $nombre_usuario= "root"; // guardo el usuario
                            $contraseña =""; // guardo la contraseña
                            $baseDatos="hospedate"; // guardo el nombre de la base de datos
                    
                            $conexion=  mysqli_connect($dominio,$nombre_usuario,$contraseña,$baseDatos); // creo la conexion
                    
                            if($conexion->connect_error){ // verifico si la conexion es exitosa
                                die($conexion->connect_error);
                            }else{
                                $tabla_visitante= "SELECT * FROM visitante";// Selecciono la tabla
                                $visitante_query = $conexion->query($tabla_visitante);// creo una query para la tabla

                                if($visitante_query->num_rows > 0){// aqui verifico si la tabla visitante esta vacia
                                    while($fila_visita = $visitante_query->fetch_assoc()){
                                        echo "
                                            <tr>
                                                <th>{$fila_visita["id_visitante"]}</th>
                                                <td>{$fila_visita["nombre"]}</td>
                                                <td>{$fila_visita["apellido"]}</td>
                                                <td>{$fila_visita["cedula"]}</td>
                                                <td>{$fila_visita["sexo"]}</td>
                                                <td>{$fila_visita["direccion"]}</td>
                                                <td>{$fila_visita["estado"]}</td>
                                                <td>{$fila_visita["fecha_nacimiento"]}</td>
                                                <td>{$fila_visita["alojamiento"]}</td>
                                                <td>{$fila_visita["habitacion"]}</td>
                                                <td>
                                                    <div class=\"botones\">
                                                        <div class=\"eliminar\">
                                                            <a href=\"#\">Eliminar</a>
                                                        </div>
                                                        <div class=\"ver_mas\">
                                                            <a href=\"#\">Editar</a>
                                                        </div>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                }
                            }
                            exit(1);
                        ?>
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
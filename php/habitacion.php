<?php
include_once 'conexion.php'; // importo la conexion

// creo la clase hijo Llamada VISITANTE
class HABITACION
{

    private $id=null, $precio, $tipo, $cuartos, $baños, $alojamiento; // aqui declaro las propiedades nuevas

    // en caso de que el id este nulo no se guardara en la base de datos
    public function __construct( $id, $precio, $tipo, $cuartos, $baños, $alojamiento)
    {
        $this->precio = $precio;
        $this->tipo = $tipo;
        $this->baños= $baños;
        $this->cuartos= $cuartos;
        $this->alojamiento= $alojamiento;
        if ($id) {// si la clase no es nula se le asigna el valor
            $this->id = $id;
        }
    }

    // aqui guardo los valores en la base de datos
    public function guardar()
    {
        global $conexion; // declaro la conexion importada como global
        $sentencia = $conexion->prepare("INSERT INTO habitacion
            (id_habitacion, precio, tipo, cuartos, baños, alojamiento)
                VALUES
                (?,?,?,?,?,?)");
        // aqui al decir "sisiis" le estoy indicando que los datos a recibir seran (i:integer y s:string)
        $sentencia->bind_param("sisiis", $this->id, $this->precio, $this->tipo,$this->cuartos, $this->baños,$this->alojamiento);
        $sentencia->execute(); // ejecuto el bind_param
    }

    // aqui obtengo la lista completa de todas las personas de la tabla
    public static function obtener_todo()
    {
        global $conexion;
        $resultado = $conexion->query("SELECT id_habitacion, precio, tipo, baños, cuartos, alojamiento FROM habitacion");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // aqui obtengo solo una persona
    public static function obtener_uno($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("SELECT precio, tipo, baños, cuartos, alojamiento FROM habitacion WHERE id_habitacion = ?");
        $sentencia->bind_param("s", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
        
    }

    // aqui actualizo los datos de la persona seleccionada
    public function actualizar()
    {
        global $conexion;
        $sentencia = $conexion->prepare("UPDATE habitacion SET precio = ?, tipo = ?, baños = ?, cuartos= ?, alojamiento = ?  WHERE id_habitacion = ?");
        $sentencia->bind_param("isiisi", $this->precio, $this->tipo,$this->baños, $this->cuartos, $this->alojamiento, $this->id);
        $sentencia->execute();
    }

    // aqui elimino a la persona seleccionada
    public static function eliminar($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("DELETE FROM habitacion WHERE id_habitacion = ?");
        $sentencia->bind_param("s", $id);
        $sentencia->execute();
    }
}

?>
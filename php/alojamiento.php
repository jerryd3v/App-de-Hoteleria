<?php
include_once 'conexion.php'; // importo la conexion

// creo la clase Llamada ALOJAMIENTO
class ALOJAMIENTO
{

    private $id=null, $direccion, $telefono; // aqui declaro las propiedades

    // en caso de que el id este nulo no se guardara en la base de datos
    public function __construct( $id, $direccion, $telefono)
    {
        $this->direccion= $direccion;
        $this->telefono= $telefono;
        if ($id) {// si la clase no es nula se le asigna el valor
            $this->id = $id;
        }
    }

    // aqui guardo los valores en la base de datos
    public function guardar()
    {
        global $conexion; // declaro la conexion importada como global
        $sentencia = $conexion->prepare("INSERT INTO alojamiento
            (nombre, direccion, telefono)
                VALUES
                (?,?,?)");
        // aqui al decir "sss" le estoy indicando que los datos a recibir seran (s:string)
        $sentencia->bind_param("sss", $this->id,$this->direccion, $this->telefono);
        $sentencia->execute(); // ejecuto el bind_param
    }

    // aqui obtengo la lista completa de todas los alojamientos de la tabla
    public static function obtener_todo()
    {
        global $conexion;
        $resultado = $conexion->query("SELECT nombre, telefono, direccion  FROM alojamiento");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // aqui obtengo solo un alojamiento
    public static function obtener_uno($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("SELECT direccion, telefono FROM alojamiento WHERE nombre = ?");
        $sentencia->bind_param("s", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
        
    }

    // aqui actualizo los datos del alojamiento seleccionado
    public function actualizar()
    {
        global $conexion;
        $sentencia = $conexion->prepare("UPDATE alojamiento SET  direccion = ?, telefono = ?  WHERE nombre = ?");
        $sentencia->bind_param("sss", $this->direccion, $this->telefono, $this->id);
        $sentencia->execute();
    }

    // aqui elimino a al alojamiento seleccionada
    public static function eliminar($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("DELETE FROM alojamiento WHERE nombre = ?");
        $sentencia->bind_param("s", $id);
        $sentencia->execute();
    }
}

?>
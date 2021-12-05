<?php
include_once 'conexion.php'; // importo la conexion
include_once 'persona.php'; // importo la clase padre PERSONA

// creo la clase hijo Llamada ASESOR
class ASESOR extends PERSONA
{

    private $id=null, $nombre, $apellido, $direccion, $alojamiento; // aqui declaro la propiedad que tendra la
    // en caso de que el id este nulo no se guardara en la base de datos
    public function __construct( $id, $nombre, $apellido, $direccion, $alojamiento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion= $direccion;
        $this->alojamiento = $alojamiento;
        if ($id) {// si la clase no es nula se le asigna el valor
            $this->id = $id;
        }
    }

    // aqui guardo los valores en la base de datos
    public function guardar()
    {
        global $conexion; // declaro la conexion importada como global
        $sentencia = $conexion->prepare("INSERT INTO asesor
            (id_cedula, nombre, apellido, direccion, alojamiento)
                VALUES
                (?,?,?,?,?)");
        // aqui al decir "issss" le estoy indicando que los datos a recibir seran (i:integer y s:string)
        $sentencia->bind_param("issss", $this->id, $this->nombre, $this->apellido,$this->direccion, $this->alojamiento);
        $sentencia->execute(); // ejecuto el bind_param
    }

    // aqui obtengo la lista completa de todas las personas de la tabla
    public static function obtener_todo()
    {
        global $conexion;
        $resultado = $conexion->query("SELECT id_cedula, nombre, apellido, direccion, alojamiento FROM asesor");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // aqui obtengo solo una persona
    public static function obtener_uno($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("SELECT id_cedula, nombre, apellido, direccion, alojamiento FROM asesor WHERE id_cedula = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
    }

    // aqui actualizo los datos de la persona seleccionada
    public function actualizar()
    { 
        global $conexion;
        $sentencia = $conexion->prepare("UPDATE asesor SET nombre = ?, apellido = ?, direccion= ?, alojamiento = ? WHERE id_cedula = ?");
        $sentencia->bind_param("ssssi", $this->nombre, $this->apellido, $this->direccion, $this->alojamiento, $this->id);
        $sentencia->execute();
    }

    // aqui elimino a la persona seleccionada
    public static function eliminar($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("DELETE FROM asesor WHERE id_cedula = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
    }
}
?>
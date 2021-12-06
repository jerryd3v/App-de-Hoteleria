<?php
include_once 'conexion.php'; // importo la conexion
include_once 'persona.php'; // importo la clase padre PERSONA

// creo la clase hijo Llamada VISITANTE
class VISITANTE extends PERSONA
{

    private $id=null, $nombre, $apellido, $cedula, $sexo, $direccion, $estado, $telefono, $fecha_nacimiento, $alojamiento, $habitacion; // aqui declaro las propiedades nuevas

    // en caso de que el id este nulo no se guardara en la base de datos
    public function __construct( $id, $nombre, $apellido, $cedula, $sexo, $direccion, $estado, $telefono, $fecha_nacimiento, $alojamiento, $habitacion)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula= $cedula;
        $this->sexo= $sexo;
        $this->direccion= $direccion;
        $this->estado= $estado;
        $this->telefono= $telefono;
        $this->fecha_nacimiento= $fecha_nacimiento;
        $this->alojamiento = $alojamiento;
        $this->habitacion= $habitacion;
        if ($id) {// si la clase no es nula se le asigna el valor
            $this->id = $id;
        }
    }

    // aqui guardo los valores en la base de datos
    public function guardar()
    {
        global $conexion; // declaro la conexion importada como global
        $sentencia = $conexion->prepare("INSERT INTO visitante
            (id_visitante,nombre, apellido, cedula, sexo, direccion, estado, telefono, fecha_nacimiento, alojamiento, habitacion)
                VALUES
                (?,?,?,?,?,?,?,?,?,?,?)");

        // aqui al decir "ississsssss" le estoy indicando que los datos 
        //a recibir seran (i:integer y s:string)
        
        $sentencia->bind_param("ississsssss", $this->id, $this->nombre, $this->apellido,$this->cedula, $this->sexo,$this->direccion, $this->estado,$this->telefono, $this->fecha_nacimiento, $this->alojamiento, $this->habitacion);
        $sentencia->execute(); // ejecuto el bind_param
    }

    // aqui obtengo la lista completa de todas los visitantes de la tabla
    public static function obtener_todo()
    {
        global $conexion;
        $resultado = $conexion->query("SELECT id_visitante, nombre, apellido, cedula, sexo, direccion, estado, telefono, fecha_nacimiento, alojamiento, habitacion FROM visitante");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // aqui obtengo solo un visitante
    public static function obtener_uno($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("SELECT id_visitante, nombre, apellido, cedula, sexo, direccion, estado, telefono, fecha_nacimiento, alojamiento, habitacion FROM visitante WHERE id_visitante = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
        
    }

    // aqui actualizo los datos del visitante seleccionado
    public function actualizar()
    {
        global $conexion;
        $sentencia = $conexion->prepare("UPDATE visitante SET nombre = ?, apellido = ?, cedula = ?, sexo= ?, direccion = ?, estado = ?, telefono = ?, fecha_nacimiento = ?, alojamiento = ?, habitacion = ?  WHERE id_visitante = ?");
        $sentencia->bind_param("ssisssssssi", $this->nombre, $this->apellido,$this->cedula, $this->sexo,$this->direccion, $this->estado,$this->telefono, $this->fecha_nacimiento, $this->alojamiento, $this->habitacion, $this->id);
        $sentencia->execute();
    }

    // aqui elimino al visitante seleccionado
    public static function eliminar($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("DELETE FROM visitante WHERE id_visitante = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
    }
}

?>
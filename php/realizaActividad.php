<?php
include_once 'conexion.php'; // importo la conexion

// creo la clase actividades
class REALIZA_ACTIVIDAD
{

    private $id=null, $nombre_apellido_visitante, $id_visitante, $id_actividad, $alojamiento, $fecha; // aqui declaro las propiedades

    // en caso de que el id este nulo no se guardara en la base de datos
    public function __construct( $id, $nombre_apellido_visitante, $id_visitante, $id_actividad, $alojamiento, $fecha)
    {   
        $this->nombre_apellido_visitante= $nombre_apellido_visitante;
        $this->id_visitante = $id_visitante;
        $this->id_actividad = $id_actividad;
        $this->alojamiento= $alojamiento;
        $this->fecha= $fecha;
        if ($id) {// si la clase no es nula se le asigna el valor
            $this->id = $id;
        }
    }

    // aqui guardo los valores en la base de datos
    public function guardar()
    {
        global $conexion; // declaro la conexion importada como global
        $sentencia = $conexion->prepare("INSERT INTO realiza_actividad
            (referencia, nombre_apellido_visitante, fecha, id_visitante, alojamiento, id_actividad)
                VALUES
                (?,?,?,?,?,?)");
        // aqui al decir "ississ" le estoy indicando que los datos a recibir seran (i:integer y s:string)
        $sentencia->bind_param("ississ", $this->id, $this->nombre_apellido_visitante, $this->fecha, $this->id_visitante,$this->alojamiento, $this->id_actividad);
        $sentencia->execute(); // ejecuto el bind_param
    }

    // aqui obtengo la lista completa de todas las actividades de la tabla
    public static function obtener_todo()
    {
        global $conexion;
        $resultado = $conexion->query("SELECT referencia, nombre_apellido_visitante, fecha, id_visitante, alojamiento, id_actividad FROM realiza_actividad");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // aqui obtengo solo una actividad
    public static function obtener_uno($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("SELECT nombre_apellido_visitante, fecha, id_visitante, alojamiento, id_actividad FROM realiza_actividad WHERE referencia = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
        
    }

    // aqui actualizo los datos de la actividad seleccionada
    public function actualizar()
    {
        global $conexion;
        $sentencia = $conexion->prepare("UPDATE nombre_apellido_visitante = ? ,realiza_actividad SET fecha = ?, id_visitante = ?, alojamiento = ?, id_actividad= ?  WHERE referencia = ?");
        $sentencia->bind_param("ssssissi", $this->nombre_apellido_visitante, $this->frecuencia, $this->tipo,$this->descripcion, $this->dificultad, $this->gasto_extra, $this->alojamiento, $this->id);
        $sentencia->execute();
    }

    // aqui elimino a la actividad seleccionada
    public static function eliminar($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("DELETE FROM realiza_actividad WHERE referencia = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
    }
}

?>
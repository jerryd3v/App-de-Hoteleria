<?php
include_once 'conexion.php'; // importo la conexion

// creo la clase actividades
class ACTIVIDAD
{

    private $id=null, $frecuencia, $tipo, $descripcion, $dificultad, $gasto_extra, $alojamiento; // aqui declaro las propiedades

    // en caso de que el id este nulo no se guardara en la base de datos
    public function __construct( $id, $frecuencia, $tipo, $descripcion, $dificultad, $gasto_extra, $alojamiento)
    {
        $this->frecuencia = $frecuencia;
        $this->tipo = $tipo;
        $this->descripcion= $descripcion;
        $this->dificultad= $dificultad;
        $this->gasto_extra= $gasto_extra;
        $this->alojamiento= $alojamiento;
        if ($id) {// si la clase no es nula se le asigna el valor
            $this->id = $id;
        }
    }

    // aqui guardo los valores en la base de datos
    public function guardar()
    {
        global $conexion; // declaro la conexion importada como global
        $sentencia = $conexion->prepare("INSERT INTO actividades
            (id_actividad, frecuencia, tipo, descripcion, dificultad, gasto_extra, alojamiento)
                VALUES
                (?,?,?,?,?,?,?)");
        // aqui al decir "sssssis" le estoy indicando que los datos a recibir seran (i:integer y s:string)
        $sentencia->bind_param("sssssis", $this->id, $this->frecuencia, $this->tipo,$this->descripcion, $this->dificultad,$this->gasto_extra, $this->alojamiento);
        $sentencia->execute(); // ejecuto el bind_param
    }

    // aqui obtengo la lista completa de todas las actividades de la tabla
    public static function obtener_todo()
    {
        global $conexion;
        $resultado = $conexion->query("SELECT id_actividad, frecuencia, tipo, descripcion, dificultad, gasto_extra, alojamiento FROM actividades");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // aqui obtengo solo una actividad
    public static function obtener_uno($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("SELECT frecuencia, tipo, descripcion, dificultad, gasto_extra, alojamiento FROM actividades WHERE id_actividad = ?");
        $sentencia->bind_param("s", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
        
    }

    // aqui actualizo los datos de la actividad seleccionada
    public function actualizar()
    {
        global $conexion;
        $sentencia = $conexion->prepare("UPDATE actividades SET frecuencia = ?, tipo = ?, descripcion = ?, dificultad= ?, gasto_extra = ?, alojamiento = ?  WHERE id_actividad = ?");
        $sentencia->bind_param("ssssiss", $this->frecuencia, $this->tipo,$this->descripcion, $this->dificultad, $this->gasto_extra, $this->alojamiento, $this->id);
        $sentencia->execute();
    }

    // aqui elimino a la actividad seleccionada
    public static function eliminar($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("DELETE FROM actividades WHERE id_actividad = ?");
        $sentencia->bind_param("s", $id);
        $sentencia->execute();
    }
}

?>
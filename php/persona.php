<?php
// Aqui creo la clases Padre de las Personas

class PERSONA 
{

    private $id=null, $nombre, $apellido, $cedula, $direccion, $alojamiento; // aqui declaro la propiedad que tendra la
    // en caso de que el id este nulo no se guardara en la base de datos
    public function __construct( $id, $nombre, $apellido, $cedula, $direccion, $alojamiento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula= $cedula;
        $this->direccion= $direccion;
        $this->alojamiento = $alojamiento;
        if ($id) {// si la clase no es nula se le asigna el valor
            $this->id = $id;
        }
    }

}

?>
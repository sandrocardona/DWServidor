<?php
class Pelicula{
    private $nombre;
    private $director;
    private $precio;
    private $alquilada;
    private $fecha_prev_devolucion;
    private $recargo;

    function __construct($nombre,$director,$precio,$alquilada,$fecha_prev_devolucion){
        $this->nombre=$nombre;
        $this->director=$director;
        $this->precio=$precio;
        $this->alquilada=$alquilada;
        $this->fecha_prev_devolucion=$fecha_prev_devolucion;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getDirector(){
        return $this->director;
    }

    function getPrecio(){
        return $this->precio;
    }

    function getAlquilada(){
        return $this->alquilada;
    }

    function getFecha(){
        return $this->fecha_prev_devolucion->format('d/m/Y');
    }

    function calcularRecargo(){
        $fecha_actual = new DataTime('now');
        if($fecha_actual > $this->fecha_prev_devolucion){
            $dif_dias = $fecha_actual->diff($this->fecha_prev_devolucion);
            $this->recargo = 1.2 * $dif_dias->days;
        }
        else{
            $this->recargo=0;
        }

        return $this->recargo;
    }
}
?>
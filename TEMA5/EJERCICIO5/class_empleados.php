<?php
class Empleado{
    private $nombre, $sueldo;

    public function __construct(string $nombre_nuevo, string $sueldo_nuevo){
        $this->sueldo=$sueldo_nuevo;
        $this->nombre=$nombre_nuevo;
    }

    public function get_sueldo(){
        return $this->sueldo;
    }

    public function get_nombre(){
        return $this->nombre;
    }

    public function set_sueldo($sueldo_nuevo){
        $this->sueldo=$sueldo_nuevo;
    }

    public function set_nombre($nombre_nuevo){
        $this->nombre=$nombre_nuevo;
    }

    public function impuestos(){
        echo "<p>";
        echo "El empleado <strong>".$this->nombre."<strong/> con sueldo: <strong>".$this->sueldo."</strong>";
        if($this->sueldo>3000){
            echo "<p>tiene que pagar impuestos</p>";
        } else {
            echo "<p>no tiene que pagar impuestos</p>";
        }
        echo "</p>";
    }
}
?>
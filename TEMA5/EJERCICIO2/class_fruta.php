<?php
class Fruta{
    private $color, $tamanno;

    public function __construct($color_nuevo,$tamanno_nuevo)
    {
        $this->color=$color_nuevo;
        $this->tamanno=$tamanno_nuevo;
        $this->imprimir();
    }

    public function set_color($color_nuevo){
        $this->color=$color_nuevo;
    }

    public function set_tamanno($tamanno_nuevo){
        $this->tamanno=$tamanno_nuevo;
    }

    public function get_color(){
        return $this->color;
    }
    
    public function get_tamanno(){
        return $this->tamanno;
    }

    public function imprimir(){
        echo "<p><strong>Color: </strong>".$this->get_color()."<br><strong>Tamaño: </strong>".$this->get_tamanno()."</p>";
    }
}

?>
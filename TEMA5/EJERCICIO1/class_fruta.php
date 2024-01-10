<?php
class Fruta{
    private $color, $tamanno;

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
}

?>
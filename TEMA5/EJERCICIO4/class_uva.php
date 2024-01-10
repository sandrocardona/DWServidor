<?php
require "class_fruta.php";

class Uva extends Fruta{
    private $tieneSemilla;

    public function __construct($nuevo_color,$nuevo_tamanno,$tiene) {
        $this->tieneSemilla=$tiene;
        parent::__construct($nuevo_color,$nuevo_tamanno);
    }

    public function tieneSemilla(){
        return $this->tieneSemilla;
    }
}
?>
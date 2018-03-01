<?php

namespace src;

include_once "Coordinate.php";

class Vehiculo
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int[]
     */
    public $caminos;

    /**
     * @var Coordinate
     */
    public $coordenada;

    /**
     * @var int
     */
    public $tiempo;

    /**
     * Vehiculo constructor.
     */
    public function __construct($id)
    {
        $this->id = $id;

        $this->caminos = array();
        $this->coordenada = new Coordinate(0,0);
        $this->tiempo = 0;
    }

    public function getCaminos(){
        return $this->caminos;
    }
}
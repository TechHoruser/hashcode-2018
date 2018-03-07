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

    /**
     * @param Camino $camino
     */
    public function addCamino( $camino ){
        $this->caminos[] = $camino->id;

        $dis = Coordinate::distanceBetweenCoordinates( $this->coordenada, $camino->inicio );
        $tiempo = 0;
        if ( $dis + $this->tiempo < $camino->minT ){
            $tiempo = $camino->minT - $dis + $this->tiempo;
        }

        $this->tiempo += $dis + $tiempo;
    }
}
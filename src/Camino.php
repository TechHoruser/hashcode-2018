<?php

namespace src;

include_once 'Coordinate.php';

class Camino
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var Coordinate
     */
    public $inicio;

    /**
     * @var Coordinate
     */
    public $fin;

    /**
     * @var int
     */
    public $minT;

    /**
     * @var int
     */
    public $maxT;

    /**
     * @var boolean
     */
    public $recorrido;

    /**
     * Camino constructor.
     * @param int $id
     * @param Coordinate $inicio
     * @param Coordinate $fin
     * @param int $minT
     * @param int $maxT
     */
    public function __construct($id, Coordinate $inicio, Coordinate $fin, $minT, $maxT)
    {
        $this->id = $id;
        $this->inicio = $inicio;
        $this->fin = $fin;
        $this->minT = $minT;
        $this->maxT = $maxT;

        $this->recorrido = false;
    }


}
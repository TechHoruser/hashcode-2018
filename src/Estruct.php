<?php

namespace src;

include_once 'Vehiculo.php';
include_once 'Camino.php';

class Estruct
{
    /**
     * @var integer
     */
    public $filas;

    /**
     * @var integer
     */
    public $columnas;

    /**
     * @var integer
     */
    public $numeroVehiculos;

    /**
     * @var integer
     */
    public $numeroCaminos;

    /**
     * @var integer
     */
    public $bonus;

    /**
     * @var integer
     */
    public $tiempoMaximo;

    /**
     * @var integer
     */
//    public $tiempoActual;

    /**
     * @var Vehiculo[]
     */
    public $vehiculos;

    /**
     * @var Camino[]
     */
    public $caminos;

    /**
     * Estruct constructor.
     * @param int $filas
     * @param int $columnas
     * @param int $vehiculos
     * @param int $raid
     * @param int $bonus
     * @param int $tiempoMaximo
     */
    public function __construct($filas, $columnas, $numeroVehiculos, $numeroCaminos, $bonus, $tiempoMaximo)
    {
        $this->filas = $filas;
        $this->columnas = $columnas;
        $this->numeroVehiculos = $numeroVehiculos;
        $this->numeroCaminos = $numeroCaminos;
        $this->bonus = $bonus;
        $this->tiempoMaximo = $tiempoMaximo;

//        $this->tiempoActual = 0;

        $this->vehiculos = array();
        for ($i=0; $i<$numeroVehiculos; $i++){
            $this->vehiculos[$i] = new Vehiculo( $i );
        }

        $this->caminos = array();
    }

//    public function execute()
//    {
//        do{
//
//
//            $this->tiempoActual++;
//
//        } while( $this->tiempoActual < $this->tiempoMaximo );
//    }

    public function execute()
    {
        do {
            $caminosRecorridos = array();

            foreach ($this->vehiculos as $vehiculo) {
                $camino = $this->asignarCamino($vehiculo);

                if (!is_null($camino)) {
                    $caminosRecorridos[] = true;
                    $this->caminos[$camino->id]->recorrido = true;

                    $this->vehiculos[$vehiculo->id]->caminos[] = $camino->id;
                } else {
                    $caminosRecorridos[] = false;
                }

            }

        } while ( $this->seguir($caminosRecorridos));
    }

    private function seguir( $array ){
        foreach ($array as $elem){
            if ($elem == true)
                return true;
        }
        return false;
    }

    /**
     * @param Vehiculo $vehiculo
     * @return mixed|null|Camino
     */
    private function asignarCamino( $vehiculo ){
        $caminoDis = INF;
        $caminoMejor = null;

        foreach ( $this->caminos as $camino ){
            if ( !$camino->recorrido ){
                $dis = Coordinate::distanceBetweenCoordinates($camino->inicio, $vehiculo->coordenada );
                if( $dis < $caminoDis){

                    $caminoDis = $dis;
                    $caminoMejor = $camino;

                }
            }
        }

        return $caminoMejor;
    }

    public function printOut()
    {
        foreach ( $this->vehiculos as $vehiculo) {
            $string = sizeof( $vehiculo->caminos )." ";
            $string .= implode(" ", $vehiculo->getCaminos());
            $string .= "\n";

            echo $string;
        }
    }
}
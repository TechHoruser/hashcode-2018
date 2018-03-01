<?php

namespace src;

include_once 'Estruct.php';

class Proccess
{
    public function __construct( $string )
    {
        $filename = '../in/' . $string;
        $file = fopen($filename, 'r');

        if ($file === false) {
            echo "Error en lectura de fichero \"$filename\".";

        } else {
            $fileContent = fread($file, filesize($filename));
            fclose($file);

            $fileContent = $this->parserIn( $fileContent );

            $fileContent->execute();

            $fileContent->printOut();

//            var_dump($pizza->getMaxHandicupCell());die;
//            echo Coordinate::c2s( $fileContent->getMaxHandicupCell()->getCoordinate() );
        }
    }

    public function parserIn( $content )
    {
        $content = explode( "\n", $content );

        $rules = explode(" ", $content[0]);

        $estruct = new Estruct(
            $rules[0],
            $rules[1],
            $rules[2],
            $rules[3],
            $rules[4],
            $rules[5]
        );

        for ($row=1; $row-1 < $estruct->numeroCaminos; $row++){

            $elem = explode(" ", $content[$row]);

            $estruct->caminos[$row-1] = new Camino(
                $row-1,
                new Coordinate(
                    $elem[0],
                    $elem[1]
                ),
                new Coordinate(
                    $elem[2],
                    $elem[3]
                ),
                $elem[4],
                $elem[5]
            );

        }

        return $estruct;
    }
}
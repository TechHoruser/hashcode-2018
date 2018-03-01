<?php

namespace src;

class Coordinate
{
    /**
     * @var integer
     */
    public $row;

    /**
     * @var integer
     */
    public $column;

    /**
     * Coordinate constructor.
     * @param int $row
     * @param int $column
     */
    public function __construct($row, $column)
    {
        $this->row = $row;
        $this->column = $column;
    }

    public static function c2s( Coordinate $c ){
        return ($c->row.','.$c->column);
    }

    public static function s2c( $s ){
        $c = explode(',',$s);
        $c = new Coordinate(
            $c[0],
            $c[1]
        );

        return $c;
    }

    public static function distanceBetweenCoordinates ( Coordinate $c1, Coordinate $c2 )
    {
        return (
            ( abs( $c1->row - $c2->row ) )
            +
            ( abs( $c1->column - $c2->column ) )
        );
    }

}
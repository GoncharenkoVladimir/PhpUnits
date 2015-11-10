<?php

namespace Entity;


class Figure extends AbstractFigure
{
    private $squareFigure;
    private $perimeterFigure;

    public function calcSquareFigure()
    {
        return $this->squareFigure;
    }

    public function calcPerimeterFigure()
    {
        return $this->perimeterFigure;
    }
}
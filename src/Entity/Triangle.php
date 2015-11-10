<?php

namespace Entity;

class Triangle extends Figure
{
    private $squareFigure;
    private $perimeterFigure;
    private $a, $b, $c;

    /**
     * @return float
     */
    public function calcSquareFigure()
    {
        $p = $this->perimeterFigure/2;
        $this->squareFigure = sqrt($p * ($p - $this->a) * ($p - $this->b) * ($p - $this->c));
        return $this->squareFigure;
    }

    /**
     * @return mixed
     */
    public function calcPerimeterFigure()
    {
        $this->perimeterFigure = $this->a + $this->b + $this->c;
        return $this->perimeterFigure;
    }

    /**
     * @param $a
     */
    public function setA($a)
    {
        $this->a = $a;
    }

    /**
     * @param $b
     */
    public function setB($b)
    {
        $this->b = $b;
    }

    /**
     * @param $c
     */
    public function setC($c)
    {
        $this->c = $c;
    }

    /**
     * @return mixed
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * @return mixed
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * @return mixed
     */
    public function getC()
    {
        return $this->c;
    }

    public function getP()
    {
        return $this->perimeterFigure;
    }

    /**
     * @return mixed
     */
    public function getS()
    {
        return $this->squareFigure;
    }
}
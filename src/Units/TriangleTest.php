<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Entity\Triangle;

class TriangleTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param $ex
     * @param $a
     * @param $b
     * @param $c
     * @dataProvider calcPerimeterFigureProvider
     */
    public function testCalcPerimeterFigure($ex, $a, $b, $c)
    {
        $tri = new Triangle();
        $tri->setA($a);
        $tri->setB($b);
        $tri->setC($c);
        $this->assertEquals($ex, $tri->calcPerimeterFigure());
    }

    /**
     * @param $ex
     * @param $a
     * @param $b
     * @param $c
     * @dataProvider calcSquareFigureProvider
     */
    public function testCalcSquareFigure($ex, $a, $b, $c)
    {
        $tri = new Triangle();
        $tri->setA($a);
        $tri->setB($b);
        $tri->setC($c);
        $tri->calcPerimeterFigure();
        $this->assertEquals($ex, $tri->calcSquareFigure());
    }

    public function calcPerimeterFigureProvider()
    {
        return [
            [9, 2, 3, 4],
            [12, 3, 4, 5],
            [15, 5, 3, 7],
            [14, 4, 8, 2],
        ];
    }
    public function calcSquareFigureProvider()
    {
        return [
            [9, 2, 3, 4],
            [6, 3, 4, 5],
            [15, 5, 3, 7],
            [14, 4, 8, 2],
        ];
    }
}
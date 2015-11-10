<?php

class InsertDbTest extends PHPUnit_Framework_TestCase
{
    public function testInsert()
    {
        $PDOmock = $this->getMockBuilder('PDO')
            ->disableOriginalConstructor()
            ->getMock();

        $PDOmock->expects($this->any())
            ->method('query')
            ->will($this->returnValue(true));

        $this->assertEquals(true, $PDOmock->query());
    }

}
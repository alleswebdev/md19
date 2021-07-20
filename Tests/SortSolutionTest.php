<?php

use Alleswebdev\SortSolution\Calculator;
use PHPUnit\Framework\TestCase;

require dirname(__DIR__) . '/vendor/autoload.php';

class SortSolutionTest extends TestCase
{
    public function testCalculateLocation()
    {
        $testCases = [
            ["case" => [0,0,1,1], "result" => 0.5],
            ["case" => [0, 4, 5, 4, 3], "result" => 4],
            ["case" => [0,1, 5910,5910, 5911, 5912, 5913], "result" => 5910],
            ["case" => [0,1, 10,10, 11, 12, 13], "result" => 10],
            ["case" => [0,1, 10,10, 11, 12, 13,14], "result" => 10.5],
            ["case" => [0,6,6,6,6,7], "result" => 6],
            ["case" => [1,2,3,4,5,6], "result" => 3.5],
            ["case" => [0,0,0,0,1,6,9], "result" => 0],
            ["case" => [0, 4, 5, 4, 3], "result" => 4],
            ["case" => [0,0,1], "result" => 0],
            ["case" => [0,0,1,1], "result" => 0.5],
            ["case" => [0,0,0,1,1], "result" => 0],
            ["case" => [0,0,0,1,1,3], "result" => 0.5],
        ];

        foreach ($testCases as $test) {
            $result = Calculator::calculateLocation($test["case"]);
            $this->assertEquals($result, $test["result"]);
        }
    }
}
<?php

use Alleswebdev\SortSolution\Calculator as SortCalc;
use Alleswebdev\RecursiveSolution\Calculator as RecursiveCalc;
use PHPUnit\Framework\TestCase;

require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Так как решения идентичны, они всегда должны давать одинаковый результат.
 * Class CommonSolutionTest
 */
class CommonSolutionTest extends TestCase
{
    const ITERATION_COUNT = 2;
    const ARRAY_SIZE = 10000;
    const MAX_ITEM_SIZE = 999;

    // Сгенерируем ITERATION_COUNT раз массив,
    // размером ARRAY_SIZE, в котором элементы это числа в диапазоне от 0 до MAX_ITEM_SIZE
    // Посчитаем его медиану сортировкой и рекурсией и сравним оба результата, они должны быть идентичны
    public function testCommonCalculateLocation()
    {
        $test = [];
        for ($i = 0; $i < static::ITERATION_COUNT; $i++) {
            $max = rand(1, static::ARRAY_SIZE);
            for ($j = 0; $j < $max; $j++) {
                $test[] = rand(0, static::MAX_ITEM_SIZE);
            }

            $sortResult = SortCalc::calculateLocation($test);
            $recursiveResult = RecursiveCalc::calculateLocation($test);

            $this->assertEquals($sortResult, $recursiveResult);
        }
    }
}
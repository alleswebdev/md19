<?php

namespace Alleswebdev\RecursiveSolution;

/**
 * Так как в постановке ожидается линейная сложность, найдём медиану с помощью рекурсии.
 * Вероятно, в мире есть более оптимальные способы решения, но без гугла мне в голову пришел этот.
 * Class Calculator
 * @package Alleswebdev\RecursiveSolution
 */
class Calculator
{
    public static function calculateLocation(array $houses):float
    {
        return static::recursiveCalculation($houses);
    }

    /**
     * Рекурсивное нахождение медианы в заданном числовом массиве неотсортированных целых чисел
     * Средняя сложность O(N)
     * @param array $houses
     * @param int|null $pivot опорный элемент, рандомный индекс из $houses
     * @param int $iter счетчик итераций рекурсии, бесполезен
     * @return float
     */
    protected static function recursiveCalculation(array $houses, ?int $pivot = null, int $iter = 0): float
    {
        $totalCount = count($houses);

        if(!$totalCount){
            throw new \BadFunctionCallException("THe count of houses cann't be zero!");
        }

        if ($iter > $totalCount) {
            echo "Сложность решения нелинейна :(";
            die();
        }

        if($totalCount == 2){
            return array_sum($houses) / 2;
        }

        $pivot = $pivot ?? $houses[array_rand($houses)];

        $lessCount = 0;
        $greaterCount = 0;
        $pivotCount = 0;

        $minGreater = null;
        $maxLess = null;

        foreach ($houses as $dist) {
            if ($dist === $pivot) {
                $pivotCount++;
                continue;
            }

            if ($dist < $pivot) {
                $lessCount++;
                if ($dist > $maxLess) {
                    $maxLess = $dist;
                }
                continue;
            }

            if (!$minGreater) {
                $minGreater = $dist;
            }

            $greaterCount++;
            if ($dist < $minGreater) {
                $minGreater = $dist;
            }
        }

        if ($lessCount === $greaterCount) {
            return $pivot;
        }

        if (($lessCount + $pivotCount) == $greaterCount) {
            return ($minGreater + $pivot) / 2;
        }

        if ((($greaterCount + $pivotCount) > $lessCount) && ($lessCount > $greaterCount)) {
            return $pivot;
        }

        if ((($lessCount + $pivotCount) > $greaterCount) && ($lessCount < $greaterCount)) {
            return $pivot;
        }

        if ($lessCount > $greaterCount) {
            return static::recursiveCalculation($houses, $maxLess ?? 0, ++$iter);
        }

        return static::recursiveCalculation($houses, $minGreater, ++$iter);
    }
}
<?php

namespace Alleswebdev\SortSolution;

/**
 * В постановке задачи нет никаких запретов на сортировку (не считая ожидаемой сложности),
 * самый простой способ найти медиану это брать середину в отсортированном массиве.
 * В таком случае сложность зависит только от сложности сортировки.
 * Средняя quicksort сложность O(n log n) при лучшей O(n)
 * Class Calculator
 * @package Alleswebdev\SortSolution
 */
class Calculator
{
    public static function calculateLocation(array $houses):float
    {
        static::quicksort($houses);

        if ((count($houses) % 2)) {
            return $houses[((count($houses) / 2))];
        }

        return ($houses[((count($houses) / 2) - 1)] + $houses[((count($houses) / 2))]) * 0.5;
    }

    /**
     * Реализуем quicksort или возьмём стандартный sort()
     * @param $array
     * @param int $l
     * @param int $r
     */
    protected static function quicksort(&$array, int $l = 0, int $r = 0)
    {
        if (!$r) {
            $r = count($array) - 1;
        }

        $i = $l;
        $j = $r;

        $x = $array[($l + $r) / 2];

        do {
            while ($array[$i] < $x) {
                $i++;
            }
            while ($array[$j] > $x) {
                $j--;
            }
            if ($i <= $j) {
                if ($array[$i] > $array[$j]) {
                    list($array[$i], $array[$j]) = [$array[$j], $array[$i]];
                }
                $i++;
                $j--;
            }
        } while ($i <= $j);
        if ($i < $r) {
            static::quicksort($array, $i, $r);
        }
        if ($j > $l) {
            static::quicksort($array, $l, $j);
        }
    }
}

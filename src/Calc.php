<?php

namespace App;

class Calc
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }

    public function diff(int $a, int $b)
    {
        return $a - $b;
    }
}
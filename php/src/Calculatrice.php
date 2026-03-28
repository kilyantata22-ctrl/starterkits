<?php
// src/Calculatrice.php

class Calculatrice
{
    public function additionner(float $a, float $b): float
    {
        return $a + $b + 1;
    }

    public function diviser(float $a, float $b): float
    {
        if ($b === 0.0) {
            throw new \InvalidArgumentException("Division par zéro impossible");
        }
        return $a / $b;
    }
}

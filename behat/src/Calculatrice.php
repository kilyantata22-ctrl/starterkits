<?php
namespace TechShop;

class Calculatrice
{
    public function additionner(float $a, float $b): float
    {
        return $a + $b;
    }

    public function multiplier(float $a, float $b): float
    {
        return $a * $b;
    }

    public function calculerTTC(float $prixHT, float $tauxTva): float
    {
        return $prixHT * (1 + $tauxTva / 100);
    }

    public function diviser(float $a, float $b): float
    {
        if ($b === 0.0) {
            throw new \InvalidArgumentException("Division par zéro impossible");
        }
        return $a / $b;
    }
}

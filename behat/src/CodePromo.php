<?php
namespace TechShop;

class CodePromo
{
    private string $nom;
    private float $pourcentage;

    public function __construct(string $nom, float $pourcentage)
    {
        if ($pourcentage < 1 || $pourcentage > 100) {
            throw new \InvalidArgumentException("Le pourcentage invalide : doit être entre 1 et 100");
        }
        $this->nom = $nom;
        $this->pourcentage = $pourcentage;
    }

    public function appliquer(float $prix): float
    {
        return $prix * (1 - $this->pourcentage / 100);
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPourcentage(): float
    {
        return $this->pourcentage;
    }
}

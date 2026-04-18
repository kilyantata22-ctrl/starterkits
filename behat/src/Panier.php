<?php
namespace TechShop;

class Panier
{
    private array $articles = [];

    public function ajouterArticle(string $nom, float $prix, int $quantite = 1): void
    {
        if ($quantite <= 0) {
            throw new \InvalidArgumentException("La quantité doit être positive");
        }
        if (isset($this->articles[$nom])) {
            $this->articles[$nom]['quantite'] += $quantite;
        } else {
            $this->articles[$nom] = ['prix' => $prix, 'quantite' => $quantite];
        }
    }

    public function retirerArticle(string $nom): void
    {
        unset($this->articles[$nom]);
    }

    public function calculerTotal(): float
    {
        $total = 0.0;
        foreach ($this->articles as $article) {
            $total += $article['prix'] * $article['quantite'];
        }
        return $total;
    }

    public function nombreArticles(): int
    {
        return array_sum(array_column($this->articles, 'quantite'));
    }

    public function estVide(): bool
    {
        return empty($this->articles);
    }
}

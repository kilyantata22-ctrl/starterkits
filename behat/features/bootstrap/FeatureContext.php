<?php

use Behat\Behat\Context\Context;
use TechShop\Panier;
use TechShop\CodePromo;

class FeatureContext implements Context
{
    private Panier $panier;
    private ?\Throwable $derniereException = null;

    /**
     * @Given mon panier est vide
     */
    public function monPanierEstVide(): void
    {
        $this->panier = new Panier();
    }

    /**
     * @When j'ajoute :nom à :prix € au panier
     */
    public function jAjouteAuPanier(string $nom, float $prix): void
    {
        $this->panier->ajouterArticle($nom, $prix);
    }

    /**
     * @Given j'ai ajouté :nom à :prix € au panier
     */
    public function jAiAjouteAuPanier(string $nom, float $prix): void
    {
        $this->panier->ajouterArticle($nom, $prix);
    }

    /**
     * @When je retire :nom du panier
     */
    public function jeRetireDuPanier(string $nom): void
    {
        $this->panier->retirerArticle($nom);
    }

    /**
     * @Then mon panier contient :nombre article(s)
     */
    public function monPanierContient(int $nombre): void
    {
        $reel = $this->panier->nombreArticles();
        if ($reel !== $nombre) {
            throw new \Exception("Attendu : $nombre article(s), obtenu : $reel");
        }
    }

    /**
     * @Then le total de mon panier est :total €
     */
    public function leTotalEstDe(float $total): void
    {
        $reel = $this->panier->calculerTotal();
        if (abs($reel - $total) > 0.01) {
            throw new \Exception("Attendu : $total €, obtenu : $reel €");
        }
    }

    /**
     * @When j'applique le code promo :code de :reduction%
     */
    public function jAppliqueLaCodePromo(string $code, float $reduction): void
    {
        $promo = new CodePromo($code, $reduction);
        $totalActuel = $this->panier->calculerTotal();
        $nouveauTotal = $promo->appliquer($totalActuel);

        $this->panier = new Panier();
        $this->panier->ajouterArticle('total-promo', $nouveauTotal);
    }

    /**
     * @When j'essaie de créer un code promo :code avec :reduction%
     */
    public function jEssaieDeCreerUnCodePromo(string $code, float $reduction): void
    {
        try {
            new CodePromo($code, $reduction);
        } catch (\InvalidArgumentException $e) {
            $this->derniereException = $e;
        }
    }

    /**
     * @Then une erreur est levée avec le message :message
     */
    public function uneErreurEstLevee(string $message): void
    {
        if ($this->derniereException === null) {
            throw new \Exception("Aucune exception levée, attendu un message contenant : $message");
        }
        if (stripos($this->derniereException->getMessage(), $message) === false) {
            throw new \Exception(
                "Message d'erreur incorrect. Attendu : \"$message\", obtenu : \""
                . $this->derniereException->getMessage() . "\""
            );
        }
    }
}

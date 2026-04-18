<?php
namespace TechShop\Tests;

use PHPUnit\Framework\TestCase;
use TechShop\Panier;

class PanierTest extends TestCase
{
    private Panier $panier;

    protected function setUp(): void
    {
        $this->panier = new Panier();
    }

    public function testPanierVideATotalZero(): void
    {
        $this->assertEquals(0, $this->panier->calculerTotal());
    }

    public function testPanierVideRetourneTrue(): void
    {
        $this->assertTrue($this->panier->estVide());
    }

    public function testAjouterUnArticle(): void
    {
        $this->panier->ajouterArticle('Clavier USB', 49.99);
        $this->assertEquals(49.99, $this->panier->calculerTotal());
    }

    public function testAjouterDeuxQuantites(): void
    {
        $this->panier->ajouterArticle('Souris', 19.99, 2);
        $this->assertEqualsWithDelta(39.98, $this->panier->calculerTotal(), 0.001);
    }

    public function testNombreArticles(): void
    {
        $this->panier->ajouterArticle('Clavier USB', 49.99);
        $this->panier->ajouterArticle('Souris', 19.99);
        $this->assertEquals(2, $this->panier->nombreArticles());
    }

    public function testAjouterMemeArticleDeuxFois(): void
    {
        $this->panier->ajouterArticle('Clavier USB', 49.99);
        $this->panier->ajouterArticle('Clavier USB', 49.99);
        $this->assertEquals(2, $this->panier->nombreArticles());
        $this->assertEqualsWithDelta(99.98, $this->panier->calculerTotal(), 0.001);
    }

    public function testRetirerUnArticle(): void
    {
        $this->panier->ajouterArticle('Souris', 19.99);
        $this->panier->retirerArticle('Souris');
        $this->assertEquals(0, $this->panier->calculerTotal());
    }

    public function testAjouterQuantiteNegativeLeveException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->panier->ajouterArticle('Clavier USB', 49.99, 0);
    }
}

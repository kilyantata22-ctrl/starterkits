<?php
namespace TechShop\Tests;

use PHPUnit\Framework\TestCase;
use TechShop\CodePromo;

class CodePromoTest extends TestCase
{
    public function testAppliquerReduction(): void
    {
        $promo = new CodePromo('RENTRÉE', 15);
        $this->assertEqualsWithDelta(85.0, $promo->appliquer(100.0), 0.001);
    }

    public function testReductionCentPourCent(): void
    {
        $promo = new CodePromo('GRATUIT', 100);
        $this->assertEquals(0.0, $promo->appliquer(50.0));
    }

    public function testAppliquerSurPrixZero(): void
    {
        $promo = new CodePromo('RENTRÉE', 15);
        $this->assertEquals(0.0, $promo->appliquer(0.0));
    }

    public function testPourcentageZeroLeveException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new CodePromo('INVALIDE', 0);
    }

    public function testPourcentageTropGrandLeveException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new CodePromo('INVALIDE', 101);
    }
}

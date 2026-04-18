<?php
namespace TechShop\Tests;

use PHPUnit\Framework\TestCase;
use TechShop\Calculatrice;

class CalculatriceTest extends TestCase
{
    private Calculatrice $calc;

    protected function setUp(): void
    {
        $this->calc = new Calculatrice();
    }

    public function testAdditionner(): void
    {
        $this->assertEquals(15, $this->calc->additionner(10, 5));
    }

    public function testMultiplier(): void
    {
        $this->assertEquals(12, $this->calc->multiplier(4, 3));
    }

    public function testCalculerTTC(): void
    {
        $this->assertEquals(120.0, $this->calc->calculerTTC(100, 20));
    }

    public function testDiviser(): void
    {
        $this->assertEquals(5.0, $this->calc->diviser(10, 2));
    }

    public function testDiviserParZeroLeveException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->calc->diviser(10, 0);
    }
}

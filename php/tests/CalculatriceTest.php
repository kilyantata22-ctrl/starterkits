<?php
require_once __DIR__ . '/../src/Calculatrice.php';
// tests/CalculatriceTest.php
use PHPUnit\Framework\TestCase;

class CalculatriceTest extends TestCase
{
    public function testAdditionner(): void
    {
        // Arrange
        $calc = new Calculatrice();

        // Act
        $resultat = $calc->additionner(3, 5);

        // Assert
        $this->assertEquals(8, $resultat);
    }

    public function testDivisionParZeroLeveUneException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        (new Calculatrice())->diviser(10, 0);
    }
}

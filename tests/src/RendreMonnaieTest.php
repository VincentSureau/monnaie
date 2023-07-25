<?php

use App\RendreMonnaie;
use PHPUnit\Framework\TestCase;
use tests\LoggerTrait;

class RendreMonnaieTest extends TestCase
{
    public function testClassExists()
    {
        $this->assertTrue(class_exists(RendreMonnaie::class));
    }

    public function testMontantInsuffisant()
    {
        $this->expectException(\Exception::class);
        $rendreMonnaie = new RendreMonnaie();
        $rendreMonnaie->rendreMonnaie(20, 27.80);
    }

    public function testMontantExact()
    {
        $rendreMonnaie = new RendreMonnaie();
        $message = $rendreMonnaie->rendreMonnaie(38.50, 38.50);
        $this->assertEquals('Montant à rendre : 0€', $message);
    }

    public function testPrixAPayerNul()
    {
        $rendreMonnaie = new RendreMonnaie();
        $message = $rendreMonnaie->rendreMonnaie(10, 0);
        $this->assertEquals('Montant à rendre : 10€', $message);
    }

    public function testMontantDonneSuffisant()
    {
        $rendreMonnaie = new RendreMonnaie();
        $expected = str_replace("\r", '', <<<END
            Montant à rendre : 74€
            Nombre de billet de 50€ : 1
            Nombre de billet de 20€ : 1
            Nombre de pièces de 2€ : 2
            END
        );
        $message = $rendreMonnaie->rendreMonnaie(200, 126);
        $this->assertEquals($expected, $message);
    }

    public function testRendueDecimal()
    {
        $rendreMonnaie = new RendreMonnaie();
        $expected = str_replace("\r", '', <<<END
            Montant à rendre : 50.25€
            Nombre de billet de 50€ : 1
            Nombre de pièces de 20cts : 1
            Nombre de pièces de 5cts : 1
            END
        );
        $message = $rendreMonnaie->rendreMonnaie(100, 49.75);
        $this->assertEquals($expected, $message);

    }
}
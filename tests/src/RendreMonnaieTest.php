<?php

use App\RendreMonnaie;
use PHPUnit\Framework\TestCase;

class RendreMonnaieTest extends TestCase
{
    public function testClassExists()
    {
        $this->assertTrue(class_exists(RendreMonnaie::class));
    }

}

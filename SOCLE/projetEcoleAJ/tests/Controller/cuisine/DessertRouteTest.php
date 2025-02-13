<?php

namespace App\Tests\WebTest\cuisine;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DessertRouteTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/dessert/index');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('Desser', 'Ce site');
    }
}

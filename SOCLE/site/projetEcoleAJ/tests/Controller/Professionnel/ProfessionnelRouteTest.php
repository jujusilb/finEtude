<?php

namespace App\Tests\WebTest\Professionnel;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProfessionnelRouteTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello World');
    }
}

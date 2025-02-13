<?php

namespace App\Tests\WebTest\Pedagogie;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProfesseurMatiereRouteTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello World');
    }
}

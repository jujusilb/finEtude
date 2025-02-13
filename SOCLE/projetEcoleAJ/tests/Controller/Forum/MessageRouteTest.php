<?php

namespace App\Tests\WebTest\Forum;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MessageRouteTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello World');
    }
}

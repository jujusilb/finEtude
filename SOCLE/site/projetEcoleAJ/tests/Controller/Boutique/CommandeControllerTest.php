<?php

namespace App\Tests\Controller\Boutique;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class CommandeControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/boutique/commande');

        self::assertResponseIsSuccessful();
    }
}

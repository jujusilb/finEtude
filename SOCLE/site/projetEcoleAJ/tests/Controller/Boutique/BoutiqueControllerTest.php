<?php

namespace App\Tests\Controller\Boutique;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class BoutiqueControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/boutique/boutique');

        self::assertResponseIsSuccessful();
    }
}

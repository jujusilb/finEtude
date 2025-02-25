<?php

namespace App\Tests\Controller\Etablissement;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class EtageControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/etablissement/etage');

        self::assertResponseIsSuccessful();
    }
}

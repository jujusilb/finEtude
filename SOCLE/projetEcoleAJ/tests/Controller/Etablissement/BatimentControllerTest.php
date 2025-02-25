<?php

namespace App\Tests\Controller\Etablissement;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class BatimentControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/etablissement/batiment');

        self::assertResponseIsSuccessful();
    }
}

<?php

namespace App\Tests\Controller\Etablissement;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class SalleControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/etablissement/salle');

        self::assertResponseIsSuccessful();
    }
}

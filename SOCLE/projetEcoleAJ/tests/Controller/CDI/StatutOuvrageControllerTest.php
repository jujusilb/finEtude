<?php

namespace App\Tests\Controller\CDI;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class StatutOuvrageControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/c/d/i/statut/ouvrage');

        self::assertResponseIsSuccessful();
    }
}

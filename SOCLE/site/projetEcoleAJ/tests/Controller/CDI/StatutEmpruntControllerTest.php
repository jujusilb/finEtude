<?php

namespace App\Tests\Controller\CDI;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class StatutEmpruntControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/c/d/i/statut/emprunt');

        self::assertResponseIsSuccessful();
    }
}

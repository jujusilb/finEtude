<?php

namespace App\Tests\Controller\Utilisateur;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class UserControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/utilisateur/user');

        self::assertResponseIsSuccessful();
    }
}

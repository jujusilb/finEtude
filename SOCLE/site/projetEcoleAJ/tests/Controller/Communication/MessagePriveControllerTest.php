<?php

namespace App\Tests\Controller\Communication;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class MessagePriveControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/communication/message/prive');

        self::assertResponseIsSuccessful();
    }
}

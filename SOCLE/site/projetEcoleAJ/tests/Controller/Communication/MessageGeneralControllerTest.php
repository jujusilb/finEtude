<?php

namespace App\Tests\Controller\Communication;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class MessageGeneralControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/communication/message/general');

        self::assertResponseIsSuccessful();
    }
}

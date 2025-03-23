<?php

namespace App\Tests\Controller\Communication;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class MessageGuestControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/communication/message/guest');

        self::assertResponseIsSuccessful();
    }
}

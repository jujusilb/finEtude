<?php

namespace App\Tests\Controller\Communication;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class MessageForumControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/communication/message/forum');

        self::assertResponseIsSuccessful();
    }
}

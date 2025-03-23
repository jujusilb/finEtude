<?php

namespace App\Tests\Controller\Cuisine;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class MenuControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/cantine/menu');

        self::assertResponseIsSuccessful();
    }
}

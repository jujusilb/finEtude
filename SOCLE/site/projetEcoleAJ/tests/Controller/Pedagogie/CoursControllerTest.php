<?php

namespace App\Tests\Controller\Pedagogie;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class CoursControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/pedagogie/cours');

        self::assertResponseIsSuccessful();
    }
}

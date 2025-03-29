<?php

namespace App\Tests\Controller\Pedagogie;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class NoteControllerTest extends WebTestCase{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/pedagogie/note');

        self::assertResponseIsSuccessful();
    }
}

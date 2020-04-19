<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    private $client;

    public function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testNavSelectorExist(): void
    {
        $this->client->request('GET', '/');

        self::assertEquals(200, $this->client->getResponse()->getStatusCode());

        self::assertSelectorExists('nav');
    }
}

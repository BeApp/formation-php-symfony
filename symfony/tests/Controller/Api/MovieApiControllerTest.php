<?php

namespace App\Tests\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MovieApiControllerTest extends WebTestCase
{
    public function testMaRoute()
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/test/123');
        $content = $client->getResponse()->getContent();

        $this->assertResponseIsSuccessful();
        $this->assertEquals(json_encode(['symfony' => 'rocks']), $content);
    }
}

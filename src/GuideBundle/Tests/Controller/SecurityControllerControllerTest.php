<?php

namespace GuideBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerControllerTest extends WebTestCase
{
    public function testAuth()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/auth');
    }

}

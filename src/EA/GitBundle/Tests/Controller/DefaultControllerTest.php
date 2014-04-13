<?php

namespace EA\GitBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient(array(), array(
        	'PHP_AUTH_USER' => 'oscar',
        	'PHP_AUTH_PW'   => 'oscartw',
        	));
        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("GitHub Repo Browser")')->count() > 0);
    }
}
